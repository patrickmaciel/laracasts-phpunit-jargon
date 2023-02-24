<?php

namespace App;

class Subscription
{
    protected Gateway $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function create(User $user)
    {
        // create the subscription through Stripe
        $this->gateway->create();

        // Update the local user record
        $user->markAsSubscribed();

        // Send a welcome email or dispatch event
    }
}