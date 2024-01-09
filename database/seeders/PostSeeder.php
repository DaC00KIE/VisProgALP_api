<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'user' => 1,
            'title' => 'This is post 1',
            'image' => 'imageString.png',
            'caption' => 'Caption of the post 1'
        ]);

        DB::table('posts')->insert([
            'user' => 2,
            'title' => 'This is post 2',
            'image' => 'imageString.png',
            'caption' => 'Caption of the post 2'
        ]);

        DB::table('posts')->insert([
            'user' => 1,
            'title' => 'This is post 3',
            'image' => 'imageString.png',
            'caption' => 'Caption of the pos 3t'
        ]);

        DB::table('posts')->insert([
            'user' => 1,
            'title' => 'This is post 4',
            'image' => 'imageString.png',
            'caption' => 'Caption of the post 4'
        ]);
    }
}
