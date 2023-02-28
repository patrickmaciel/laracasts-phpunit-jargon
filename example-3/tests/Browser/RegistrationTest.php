<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     * @throws \Throwable
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laracasts');
        });
    }

    /** @test
     * @throws \Throwable
     */
    function register_new_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('name', 'Patrick Xueis')
                ->type('password', 'Jesus@Salvador')
                ->type('password_confirmation', 'Jesus@Salvador')
                ->type('email', 'patrick.xueis@gmail.com')
                ->screenshot('register')
                ->press('REGISTER')
                ->assertAuthenticated()
                ->assertRouteIs('dashboard');
//                ->assertPathIs('/dashboard');
        });
    }
}
