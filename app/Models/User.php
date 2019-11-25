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
        $forename = preg_replace('/\s/', '', $forename);
        if (is_numeric($forename) || !is_string($forename)) {
            throw new TypeNotValidException;
        } else {
            $this->forename = $forename;
        }
    }

    public function getForename()
    {
        return $this->forename;
    }

    public function setSurname($surname)
    {
        $surname = preg_replace('/\s/', '', $surname);
        if (is_numeric($surname) || !is_string($surname)) {
            throw new TypeNotValidException;
        } else {
            $this->surname = $surname;
        }
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getFullName()
    {
        return "$this->forename $this->surname";
    }
}
