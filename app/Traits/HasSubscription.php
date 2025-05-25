<?php

namespace App\Traits;

use App\Models\Plan;

trait HasSubscription
{
    /**
     * Get the user's subscriptions.
     *
     * @input string $plan
     */
    public function isSubscribedTo(string $name): bool
    {
        $plan = Plan::where('name', $name)->first();
        if (!$plan) throw new \Exception("Plan not found: {$name}");
        
        return $this->subscriptions()->whereIn('status', ['active','pending'])->where('plan_id', $plan->id)->exists();
    }

    /**
     * Check if the user is subscribed to the 'Annahda Plus' plan.
     *
     * @return bool
     */
    public function isPlusMember(): bool
    {
        return $this->isSubscribedTo('Annahda Plus');
    }
}
