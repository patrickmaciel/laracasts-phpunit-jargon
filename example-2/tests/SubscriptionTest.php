<?php

namespace Tests;

use App\Gateway;
use App\Mailer;
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
        // dummy - I don't care what it does
        $subscription = new Subscription(
            $this->createMock(Gateway::class),
            $this->createMock(Mailer::class)
        );

        $user = new User('Jesus');
        $this->assertFalse($user->isSubscribed());

        $subscription->create($user);
        $this->assertTrue($user->isSubscribed());
    }

    /** @test */
    function it_delivers_a_receipt()
    {
        // stub - not expectation, I want to return something
        $gateway = $this->createMock(Gateway::class);
        $gateway->method('create')->willReturn('receipt-stub');

        // mock - I expect something
        $mailer = $this->createMock(Mailer::class);
        $mailer->expects($this->once())
            ->method('deliver')
            ->with('Your receipt number is: receipt-stub');

        $subscription = new Subscription($gateway, $mailer);
        $subscription->create(new User('Jesus'));
    }
}