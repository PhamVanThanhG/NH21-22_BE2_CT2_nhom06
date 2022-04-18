<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discount')->insert([
            [
                'active' => 15,
            ],
            [
                'active' => 20,
            ],
            [
                'active' => 35,
            ]
        ]);
    }
}
