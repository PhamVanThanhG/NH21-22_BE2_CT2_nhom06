<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Product_TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_type')->insert([
            [
                'type_name' => "Camera",
                'image' => "p8.png"
            ],
            [
                'type_name' => "Music speaker",
                'image' => "loa-bluetooth-jbl-go2blk-den-do-up-1-org.jpg"
            ],
            [
                'type_name' => "Laptop",
                'image' => "hp-zbook-firefly-14-g8-i7-275w0av-1.jpg"
            ],
        ]);
    }
}
