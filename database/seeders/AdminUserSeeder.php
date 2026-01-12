<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user (Registrar Head)
        User::create([
            'name' => 'Registrar Head',
            'email' => 'admin@registrar.com',
            'password' => Hash::make('password'),
            'role' => 'head',
        ]);

        // Create sample officer user
        User::create([
            'name' => 'Registrar Officer',
            'email' => 'officer@registrar.com',
            'password' => Hash::make('password'),
            'role' => 'officer',
        ]);
    }
}
