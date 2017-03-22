<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends DuskTestCase
{

    use DatabaseMigrations;

    /**
     * User Registration Test.
     *
     * @group register
     * @return void
     */
    public function testRegister()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->type('user_login', 'test_user')
                ->type('email', 'test@example.com')
                ->type('password', 'password')
                ->type('password_confirmation', 'password')
                ->click('button[type=submit]')
                ->assertSee('logged in');
        });
    }
}
