<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_store')->insert([
            'username' => 'user1',
            'email' => 'user1@example.com',
            'password' => Hash::make('12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
