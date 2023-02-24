<?php

namespace Tests;

use App\Subscription;
use App\User;
use PHPUnit\Framework\TestCase;

class SubscriptionTest extends TestCase
{
    /** @test */
    function it_creates_a_stripe_subscription()
    {
        $this->markTestSkipped();
    }

    /** @test */
    function creating_a_abuscription_marks_the_user_as_subscribed()
    {
        $gateway = new FakeGateway(); // Mocking the gateway
        $subscription = new Subscription($gateway);
        $user = new User('Jesus');
        $this->assertFalse($user->isSubscribed());

        $subscription->create($user);
        $this->assertTrue($user->isSubscribed());
    }

}