<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            'name' => Str::random(10),
            'type_id' => 1,
            'description' => Str::random(10),
            'image' => Str::random(10),
            'price' => 1,
            'discount_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'feature' => true,
            'expire_period' => 1,
        ]);
        DB::table('product')->insert([
                'name' => Str::random(10),
                'type_id' => 1,
                'description' => Str::random(10),
                'image' => Str::random(10),
                'price' => 1,
                'discount_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'feature' => true,
                'expire_period' => 1,
            ]);
        //
    }
}
