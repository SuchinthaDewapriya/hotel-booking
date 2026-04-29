<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('menus')->insert([
        [
            'name' => 'Fried Rice',
            'price' => 1200,
            'description' => 'Delicious Sri Lankan fried rice',
            'category' => 'Lunch',
            'image' => 'food_1.jpg',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'name' => 'Seafood Pasta',
            'price' => 1800,
            'description' => 'Fresh seafood pasta',
            'category' => 'Dinner',
            'image' => 'food_2.jpg',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]
    ]);
}
}
