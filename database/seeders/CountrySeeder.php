<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run()
    {
        DB::table('apps_countries')->insert([
            ['country_code' => 'LK', 'country_name' => 'Sri Lanka', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'US', 'country_name' => 'United States', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'GB', 'country_name' => 'United Kingdom', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'IN', 'country_name' => 'India', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'AU', 'country_name' => 'Australia', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'CA', 'country_name' => 'Canada', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'DE', 'country_name' => 'Germany', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'FR', 'country_name' => 'France', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'JP', 'country_name' => 'Japan', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'CN', 'country_name' => 'China', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'BR', 'country_name' => 'Brazil', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'ZA', 'country_name' => 'South Africa', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'AE', 'country_name' => 'United Arab Emirates', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'SG', 'country_name' => 'Singapore', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'TH', 'country_name' => 'Thailand', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'IT', 'country_name' => 'Italy', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'ES', 'country_name' => 'Spain', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'NL', 'country_name' => 'Netherlands', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'CH', 'country_name' => 'Switzerland', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'SE', 'country_name' => 'Sweden', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}