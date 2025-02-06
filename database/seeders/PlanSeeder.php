<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;
class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
            'name'                  => 'Annahda Plus',
            'price'                 => 150,
            'sale_price'            => 100,
            'discount_percentage'   => 33,
        ]);

        Plan::create([
            'name'                  => 'Main Magazine',
            'price'                 => 400,
            'sale_price'            => 350,
            'discount_percentage'   => 12.5,
        ]);

        Plan::create([
            'name'                  => 'Kids Magazine',
            'price'                 => 380,
            'sale_price'            => 300,
            'discount_percentage'   => 21,
        ]);
    }
}
