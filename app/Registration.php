<?php

namespace App;

use App\AppMailer;
use App\User;

class Registration {

    private $mailer;
    private $user;

    public function __construct(AppMailer $mailer, User $user)
    {
        $this->mailer = $mailer;
        $this->user = $user;
    }

    public function registerNewUser(array $data)
    {
        $this->createUser($data);
        $this->sendRegistrationEmailTo($this->user->email);
        return $this->user;
    }

    private function sendRegistrationEmailTo($email)
    {
        $this->mailer->sendTo($email);
    }

    private function createUser(array $data)
    {
        $this->user->name = $data['name'];
        $this->user->email = $data['email'];
        $this->user->password = $data['password'];
        $this->user->save();
    }
}
