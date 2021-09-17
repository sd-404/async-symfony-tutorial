<?php

namespace App\Message;

final class SendEmailNotification
{
     private $email;

     public function __construct(string $email)
     {
         $this->email = $email;
     }

    public function getEmail(): string
    {
        return $this->email;
    }
}
