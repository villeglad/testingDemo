<?php

use App\AppMailer;
use App\Registration;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class RegistrationTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    function userRegisteredAndGotEmailSent()
    {
        // new User
        $user = new User;
        
        // mocked AppMailer
        $appMailer = $this->prophesize(AppMailer::class);
        
        // new up the Registration class
        $registration = new Registration($appMailer->reveal(), $user);

        // test data
        $data = [
            'name' => 'Test user',
            'email' => 'user@example.com',
            'password' => 'mySecretAccessCode',
        ];

        $notSentData = [
            'name' => 'Not registered',
            'email' => 'user2@example.com',
            'password' => 'mySecretAccessCode',
        ];

        // expect sendTo method is called
        $appMailer->sendTo($data['email'])->shouldBeCalled();

        // expect sendTo method is not called with wrong data
        $appMailer->sendTo($notSentData['email'])->shouldNotBeCalled();

        // act
        $newUser = $registration->registerNewUser($data);

        $this->assertInstanceOf(User::class, $newUser);
        $this->assertEquals($newUser->email, $data['email']);
        $this->seeInDatabase('users', ['email' => 'user@example.com']);
        $this->dontSeeInDatabase('users', $notSentData);
    }

    // Test that exception is thrown
    
    function testNewUserIsNotMadeBecauseOfUniqueConstraintViolation()
    {
        $user1 = factory(User::class)->create(['email' => 'user@example.com']);
        
        $user = new User;
        $appMailer = $this->prophesize(AppMailer::class);
        $registration = new Registration($appMailer->reveal(), $user);

        $data = [
            'name' => 'Test user',
            'email' => 'user@example.com',
            'password' => 'mySecretAccessCode',
        ];

        // expect sendTo method is not called
        $appMailer->sendTo($data['email'])->shouldNotBeCalled();

        // expect exception because same email is already in db
        $this->expectException(PDOException::class);
        $newUser = $registration->registerNewUser($data);
    }
}
