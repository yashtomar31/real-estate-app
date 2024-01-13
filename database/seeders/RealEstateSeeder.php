<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class RealEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         foreach (range(1, 30) as $index) {
            DB::table('real_estates')->insert([
                'name' => Str::random(10),
                'real_state_type' => 'Apartment',
                'street' => Str::random(10) . ' Street',
                'external_number' => rand(1, 100),
                'internal_number' => rand(1, 50),
                'neighborhood' => Str::random(10),
                'city' => 'City ' . $index,
                'country' => 'Country ' . $index,
                'rooms' => rand(1, 5),
                'bathrooms' => rand(1, 3),
                'comments' => 'Comment ' . Str::random(30),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
