<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginFormTest extends TestCase
{
    use DatabaseMigrations;

    public function testLoginForm()
    {
        $user = factory(App\User::class)->create(['email' => 'user@example.com', 'password' => Hash::make('mySecretAccessCode')]);
        $this->visit('/login')
             ->see('Login')
             ->type('user@example.com', 'email')
             ->type('mySecretAccessCode', 'password')
             ->press('login')
             ->seePageIs('/admin');
    }
}
