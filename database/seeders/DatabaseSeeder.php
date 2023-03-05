<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'Valentin',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'username' => 'Thomas',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'username' => 'Gaultier',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin'),
        ]);


        \App\Models\Game::factory(2)->create();
    }
}
