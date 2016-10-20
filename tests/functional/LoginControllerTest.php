<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testUserWasLoggedIn()
    {
        $user = factory(App\User::class)->create(['email' => 'user@example.com', 'password' => Hash::make('mySecretAccessCode')]);

        $response = $this->call('POST', '/login', ['email' => 'user@example.com', 'password' => 'mySecretAccessCode']);
        $this->assertSame(302, $response->status());
    }

    // With Laravel Custom Assertions
    public function testUserWasLoggedInWithLaravelHelpers()
    {
        $user = factory(App\User::class)->create(['email' => 'user@example.com', 'password' => Hash::make('mySecretAccessCode')]);

        $this->post('/login', ['email' => 'user@example.com', 'password' => 'mySecretAccessCode']);
        $this->assertResponseStatus(302);
        $this->assertRedirectedTo('/admin');
    }
}
