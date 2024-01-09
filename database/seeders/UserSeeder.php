<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'display_name' => 'JohnD',
            'bio' => 'single and never gonna mingle',
            'location' => 'Mars'
        ]);

        DB::table('users')->insert([
            'username' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'),
            'display_name' => 'JaneD',
            'bio' => 'A',
        ]);

        DB::table('users')->insert([
            'username' => 'Bob Smith',
            'email' => 'bob@example.com',
            'password' => bcrypt('password'),
            'display_name' => 'BobS',
            'location' => 'Indonesia'
        ]);
    }
}
