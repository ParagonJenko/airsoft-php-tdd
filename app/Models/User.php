<?php

namespace App\Models;

use App\Exceptions\EmailNotValidException;

class User
{
    private $email_address;

    public function __construct()
    {
    }

    public function setEmail($email)
    {
        $email = trim($email);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email_address = $email;
        } else {
            throw new EmailNotValidException;
        }
    }

    public function getEmail()
    {
        return $this->email_address;
    }
}
