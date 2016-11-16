<?php

use App\AppMailer;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Prophecy\Argument;

class RegisterTest extends TestCase
{
    use DatabaseMigrations;

    // Assert that register form can be used for registering a new user
    /** @test */
    function it_should_register_new_user()
    {
        $this->visit('/register')
             ->see('Register')
             ->type('Test User', 'name')
             ->type('user@example.com', 'email')
             ->type('mySecretAccessCode', 'password')
             ->press('register')
             ->seePageIs('/admin');
    }

    // Mocking the AppMailer class
    /** @test */
    // function it_should_call_register_api_method()
    // {
    //     $data = [
    //         'name' => 'Test user',
    //         'email' => 'user@example.com',
    //         'password' => 'mySecretAccessCode',
    //     ];
        
    //     // mock the mailer
    //     $this->mailer = $this->prophesize(AppMailer::class);
    //     $this->app->instance(AppMailer::class, $this->mailer->reveal());

    //     $this->mailer->sendTo($data['email'])->shouldBeCalled();

        
    //     $this->post('/register', $data)
    //          ->assertResponseStatus(302);
    // }
}
