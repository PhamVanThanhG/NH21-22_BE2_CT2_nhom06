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
            [
                'name' => "hoang",
                'email'=> "hoangjack09@gmail.com",
                'password'=>Hash::make("12345678"),
                'role_as'=> 1,

            ],
            [
                'name' => "hoang2",
                'email'=> "hoangjack092@gmail.com",
                'password'=>Hash::make("12345678"),
                'role_as'=> 0,

            ],
            [
                'name' => "Pham Van Thanh",
                'email'=> "robertthanh1107@gmail.com",
                'password'=>Hash::make("12345678"),
                'role_as'=> 0,
            ],
        ]);
    }
}