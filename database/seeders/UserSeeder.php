<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin User (manages everything)
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'type' => 'admin',
        ]);

        // Test Customer
        User::create([
            'name' => 'Bhagya',
            'email' => 'customer@customer.com',
            'password' => Hash::make('bhagya123'),
            'type' => 'customer',
        ]);
    }
}