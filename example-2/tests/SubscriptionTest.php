<?php

namespace Tests;

use App\Gateway;
use App\Subscription;
use App\User;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class SubscriptionTest extends TestCase
{
    /** @test */
    function it_creates_a_stripe_subscription()
    {
        $this->markTestSkipped();
    }

    /** @test
     * @throws Exception
     */
    function creating_a_abuscription_marks_the_user_as_subscribed()
    {
//        $gateway = $this->createMock(Gateway::class);
//        $gateway->method('create')->willReturn('receipt-stub');
        $gateway = new GatewayStub();

        $subscription = new Subscription($gateway);

        $user = new User('Jesus');
        $this->assertFalse($user->isSubscribed());

        $subscription->create($user);
        $this->assertTrue($user->isSubscribed());
    }

}