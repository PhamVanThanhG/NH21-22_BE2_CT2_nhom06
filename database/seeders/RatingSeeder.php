<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rating')->insert([
            [
                'product_id' => 1,
                'user_id' => 1,
                'rating_value' => 5,
                'comment' => "San pham tuyet voi",
                'created_at' => date("Y-m-d H:i:s"),

            ],
            [
                'product_id' => 2,
                'user_id' => 2,
                'rating_value' => 5,
                'comment' => "San pham khong tot",
                'created_at' => date("Y-m-d H:i:s"),

            ],
            [
                'product_id' => 1,
                'user_id' => 2,
                'rating_value' => 2,
                'comment' => "San pham tam duoc",
                'created_at' => date("Y-m-d H:i:s"),

            ],
            
           
           
        ]);
        //
    }
}