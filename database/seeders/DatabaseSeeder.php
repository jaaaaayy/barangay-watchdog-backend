<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            [
                'username' => 'admin_user',
                'email' => 'admin@example.com',
                'phone' => '09171234567',
                'role' => 'admin',
                'is_anonymous' => false,
                'created_at' => now()
            ],
            [
                'username' => 'juan_citizen',
                'email' => 'juan@example.com',
                'phone' => '09181234567',
                'role' => 'citizen',
                'is_anonymous' => true,
                'created_at' => now()
            ]
        ]);

    }
}
