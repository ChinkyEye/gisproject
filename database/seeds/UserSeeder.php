<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ADMIN',
            'email' => 'admin@techware.com.np',
            'phone' => '9852012345',
            'address' => 'Biratnagar',
            'email_verified_at' => now(),
            'password' => '$2y$10$eAEF24Uto64jknFqlzRgXOZA7tWIiWNo3NB3dSpgkzQseTHOL7aIK', //admin123
            'date_np' => date('Y-m-d'),
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'user_type' => '1',
            'is_active' => '1',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
