<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default admin user if not exists
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@example.com'],
            [
                'first_name' => 'Admin',
                'email' => 'zirkajewelry@ukr.net',
                'password' => Hash::make('K8-q%E[2W5'), // Default password
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
