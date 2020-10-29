<?php

use Illuminate\Database\Seeder;
use App\Plan;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = new Plan();
        $plan->name = "Pro";
        $plan->slug = "pro";
        $plan->stripe_plan = "price_1GqQXgIaWaHmdLrb65BFWAHr";
        $plan->cost = 290.00;
        $plan->description = "Plan Pro";
        $plan->save();

        $plan = new Plan();
        $plan->name = "Expert";
        $plan->slug = "expert";
        $plan->stripe_plan = "price_1GqQZRIaWaHmdLrbK7mkj1aI";
        $plan->cost = 390.00;
        $plan->description = "Plan Expert";
        $plan->save();
    }
}
