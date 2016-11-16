<?php

namespace App;

use Mail;

class AppMailer
{
    private $template = 'emails.user-registered';
    private $subject = 'Thanks for registration';

    /**
     * @param  $emailAddress
     */
    public function sendTo($emailAddress)
    {
        Mail::queue($this->template, [], function ($message) use ($emailAddress) {
            $message->from('app@example.com')
                    ->to($emailAddress)
                    ->subject($this->subject);
        });
    }
}
