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
                'name' => "Quoc Hoang",
                'email' => "quochoang".'@gmail.com',
                //'password' => Hash::make('password'),
                'password' => "123456",
                'address' => "Phu Yen",
                'phonenumber' => "0787539285",
                'created_at' => date("Y-m-d H:i:s"),
                'role' => 1,
                'birthday' => date("Y-m-d H:i:s"),

            ],
            [
                'name' => "Van Thanh",
                'email' => "vanthanh".'@gmail.com',
                //'password' => Hash::make('password'),
                'password' => "123456",
                'address' => "Binh Dinh",
                'phonenumber' => "0787539285",
                'created_at' => date("Y-m-d H:i:s"),
                'role' => 1,
                'birthday' => date("Y-m-d H:i:s"),

            ],
           
        ]);
        

        //
    }
}
