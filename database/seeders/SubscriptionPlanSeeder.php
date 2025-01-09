<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use LucasDotVin\Soulbscription\Enums\PeriodicityType;
use LucasDotVin\Soulbscription\Models\Plan;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $annahda = Plan::create([
            'name'             => 'annahda',
            'periodicity_type' => PeriodicityType::Year,
            'periodicity'      => 1,
        ]);

        $annahda = Plan::create([
            'name'             => 'annahda kids',
            'periodicity_type' => PeriodicityType::Year,
            'periodicity'      => 1,
        ]);

        $annahda = Plan::create([
            'name'             => 'annahda online',
            'periodicity_type' => PeriodicityType::Year,
            'periodicity'      => 1,
        ]);

        $annahda = Plan::create([
            'name'             => 'combo',
            'periodicity_type' => PeriodicityType::Year,
            'periodicity'      => 1,
        ]);
    }
}
