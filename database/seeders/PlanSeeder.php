<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Annahda Plus',
                'price' => 150,
                'sale_price' => 100,
                'discount_percentage' => 33,
            ],
            [
                'name' => 'Main Magazine',
                'price' => 400,
                'sale_price' => 350,
                'discount_percentage' => 12.5,
            ],
            [
                'name' => 'Kids Magazine',
                'price' => 380,
                'sale_price' => 300,
                'discount_percentage' => 21,
            ],
        ];

        foreach ($plans as $plan) {
            Plan::updateOrCreate(
                ['name' => $plan['name']],
                $plan
            );
        }

        $this->command->info('✅ Plans seeded or updated successfully.');
    }
}
