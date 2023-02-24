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
        $subscription = new Subscription($this->createMock(Gateway::class));
        $user = new User('Jesus');
        $this->assertFalse($user->isSubscribed());

        $subscription->create($user);
        $this->assertTrue($user->isSubscribed());
    }

}