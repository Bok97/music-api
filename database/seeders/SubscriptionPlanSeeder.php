<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    public function run()
    {
        SubscriptionPlan::create([
            'title' => 'Bronze Plan',
            'description' => 'Enjoy 30 days unlimited access!',
            'number_of_days' => 30,
            'price_cents' => 1500,
            'status' => 'active',
        ]);

        SubscriptionPlan::create([
            'title' => 'Silver Plan',
            'description' => 'Enjoy 90 days unlimited access!',
            'number_of_days' => 90,
            'price_cents' => 4500,
            'status' => 'active',
        ]);

        SubscriptionPlan::create([
            'title' => 'Gold Plan',
            'description' => 'Enjoy 180 days unlimited access!',
            'number_of_days' => 180,
            'price_cents' => 9000,
            'status' => 'active',
        ]);

        SubscriptionPlan::create([
            'title' => 'Diamond Plan',
            'description' => 'Enjoy 360 days unlimited access!',
            'number_of_days' => 360,
            'price_cents' => 18000,
            'status' => 'active',
        ]);
    }
}
