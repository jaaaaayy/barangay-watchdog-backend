<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Juan',
            'middle_name' => 'Dela',
            'last_name' => 'Cruz',
            'username' => 'juandelacruz',
            'phone_number' => '09171234567',
            'role' => 'barangay_official',
            'email' => 'juan@example.com',
            'password' => 'password123',
        ]);

        User::factory()->create([
            'first_name' => 'Maria',
            'middle_name' => 'Santos',
            'last_name' => 'Pena',
            'username' => 'mariasantos',
            'phone_number' => '09281234567',
            'role' => 'barangay_official',
            'email' => 'maria@example.com',
            'password' => 'password123',
        ]);

        User::factory()->create([
            'first_name' => 'Carlos',
            'middle_name' => 'Martinez',
            'last_name' => 'Gomez',
            'username' => 'carlosmartinez',
            'phone_number' => '09331234567',
            'role' => 'barangay_official',
            'email' => 'carlos@example.com',
            'password' => 'password123',
        ]);
    }
}
