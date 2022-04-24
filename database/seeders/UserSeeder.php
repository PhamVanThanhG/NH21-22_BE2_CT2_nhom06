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
        DB::table('user')->insert([
            'username' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'address' => Str::random(10),
            'phonenumber' => Str::random(10),
            'created_at' => date("Y-m-d H:i:s"),
            'role' => 1,
            'birthday' => date("Y-m-d H:i:s"),
        ]);
        DB::table('user')->insert([
            'username' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'address' => Str::random(10),
            'phonenumber' => Str::random(10),
            'created_at' => date("Y-m-d H:i:s"),
            'role' => 1,
            'birthday' => date("Y-m-d H:i:s"),
        ]);

        //
    }
}
