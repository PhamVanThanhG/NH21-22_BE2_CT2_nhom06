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
                'active' => true,
                'values' => 0.5,
            ],
            [
                'active' => true,
                'values' => 0.2,
            ],
            [
                'active' => false,
                'values' => 0,
            ]
        ]);
    }
}
