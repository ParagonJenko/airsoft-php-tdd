<?php

namespace App\Models;

use App\Exceptions\TypeNotValidException;

class User
{
    private $email_address;
    private $forename;

    public function __construct()
    {
    }

    public function setEmail($email)
    {
        $email = trim($email);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email_address = $email;
        } else {
            throw new TypeNotValidException;
        }
    }

    public function getEmail()
    {
        return $this->email_address;
    }

    public function setForename($forename)
    {
        if (is_numeric($forename) || !is_string($forename)) {
            throw new TypeNotValidException;
        } else {
            $this->forename = trim($forename);
        }
    }

    public function getForename()
    {
        return $this->forename;
    }

    public function setSurname($surname)
    {
        if (is_numeric($surname) || !is_string($surname)) {
            throw new TypeNotValidException;
        } else {
            $this->surname = trim($surname);
        }
    }

    public function getSurname()
    {
        return $this->surname;
    }
}
