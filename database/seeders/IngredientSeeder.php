<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredients')->insert([
            'name' => 'Carrot',
        ]);

        DB::table('ingredients')->insert([
            'name' => 'Eggs',
        ]);

        DB::table('ingredients')->insert([
            'name' => 'Milk',
        ]);

        DB::table('ingredients')->insert([
            'name' => 'Sugar',
        ]);

        DB::table('ingredients')->insert([
            'name' => 'Salt',
        ]);

        DB::table('ingredients')->insert([
            'name' => 'Flour',
        ]);
    }
}
