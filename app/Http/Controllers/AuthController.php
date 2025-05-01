<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'last_name' => 'required|string|max:50',
            'username' => 'required|string|min:3|max:20|unique:users',
            'email' => 'required|email|unique:users',
            'phone_number' => 'string|nullable|unique:users',
            'password' => 'required|string|min:8|max:255',
            'role' => 'required|in:citizen,barangay_official,admin',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        $tokenExpiration = now()->addDay();
        $token = $user->createToken($validated['username'], ['*'], $tokenExpiration);

        return response([
            'message' => 'Registration successful.',
            'user' => $user,
            'token' => $token->plainTextToken,
            'tokenExpiration' => $tokenExpiration
        ], 201);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|min:3|max:20',
            'password' => 'required|string|min:8|max:255',
        ]);

        $user = User::where('username', $validated['username'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response(['message' => 'Username or password is incorrect.'], 400);
        }

        $tokenExpiration = now()->addDay();
        $token = $user->createToken($validated['username'], ['*'], $tokenExpiration);

        return response([
            'message' => 'Login successful.', 
            'user' => $user,
            'token' => $token->plainTextToken,
            'tokenExpiration' => $tokenExpiration
        ]);
    }

    public function authStatus(Request $request) {
        $user = $request->user();

        if ($user) {
            return response(['message' => 'Authenticated.']);
        }
    }

    public function logout(Request $request) {
        $user = $request->user();
        $user->tokens()->delete();

        return response(['message' => 'Logged out successfully.']);
    }
}
