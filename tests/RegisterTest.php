<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends TestCase
{
    use DatabaseMigrations;

    // Assert that register form can be used for registering a new user
    /** @test */
    function it_should_register_new_user()
    {
        $this->disableExceptionHandling();
        $this->visit('/register')
             ->see('Register')
             ->type('Test User', 'name')
             ->type('user@example.com', 'email')
             ->type('mySecretAccessCode', 'password')
             ->press('register')
             ->seePageIs('/admin')
             ->see('Logged in');
    }
}
