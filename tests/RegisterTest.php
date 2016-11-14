<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

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


    // Testing User-class static method "registerNewUser"
    /** @test */
    function it_should_create_a_new_user()
    {
        $data = [
            'name' => 'Test user',
            'email' => 'user@example.com',
            'password' => 'mySecretAccessCode',
        ];

        $user = User::registerNewUser($data);
        $this->assertEquals($data['name'], $user->name);

        $this->seeInDatabase('users', [
            'email' => 'user@example.com'
        ]);
    }

    // Test that exception is thrown
    /** @test */
    function it_should_not_create_a_new_user_because_email_is_already_used()
    {
        $user1 = factory(User::class)->create(['email' => 'user@example.com']);

        // registerNewUser-method should throw PDOException because of violating unique constraint
        $this->expectException(PDOException::class);
        
        $user2 = User::registerNewUser([
            'name' => 'User Two',
            'email' => 'user@example.com',
            'password' => 'mySecretAccessCode'
        ]);
    }
}
