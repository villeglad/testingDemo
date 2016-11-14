<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function it_should_login_user()
    {
        $user = factory(App\User::class)->create([
            'email' => 'user@example.com',
            'password' => Hash::make('mySecretAccessCode')
        ]);

        $this->visit('/login')
             ->see('Login')
             ->type('user@example.com', 'email')
             ->type('mySecretAccessCode', 'password')
             ->press('login')
             ->seePageIs('/admin');
    }

    // Test by using API method
    // POST
    /** @test */
    function user_is_logged_in_the_standard_way()
    {
        $user = factory(App\User::class)->create([
            'email' => 'user@example.com',
            'password' => Hash::make('mySecretAccessCode')
        ]);

        $response = $this->call('POST', '/login', [
            'email' => 'user@example.com',
            'password' => 'mySecretAccessCode'
        ]);

        $this->assertSame(302, $response->status());
    }

    // With Laravel Assertions
    /** @test */
    function user_is_logged_in_shorter_way()
    {
        $user = factory(App\User::class)->create(['email' => 'user@example.com', 'password' => Hash::make('mySecretAccessCode')]);

        $this->post('/login', ['email' => 'user@example.com', 'password' => 'mySecretAccessCode']);
        $this->assertResponseStatus(302);
        $this->assertRedirectedTo('/admin');
    }
}
