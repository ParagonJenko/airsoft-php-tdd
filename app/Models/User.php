<?php

namespace App\Models;

use App\Exceptions\TypeNotValidException;
use App\Exceptions\NotEnougCharacterException;
use App\Support\Validation;

class User
{
    private $email_address;
    private $forename;
    private $surname;
    private $password;

    public function __construct()
    {
    }

    public function setEmail($email)
    {
        $email = Validation::removeAllWhiteSpace($email);

        if (Validation::checkIfIsType($email, "email_address")) {
            $this->email_address = $email;
        }
    }

    public function getEmail()
    {
        return $this->email_address;
    }

    public function setForename($forename)
    {
        $forename = Validation::removeAllWhiteSpace($forename);

        if (!Validation::checkIfNotType($forename, "integer", false) && Validation::checkIfIsType($forename, "string")) {
            $this->forename = $forename;
        }
    }

    public function getForename()
    {
        return $this->forename;
    }

    public function setSurname($surname)
    {
        $surname = Validation::removeAllWhiteSpace($surname);
        if (!Validation::checkIfNotType($surname, "integer", false) && Validation::checkIfIsType($surname, "string")) {
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

    public function setHashedPassword($password)
    {
        $password = Validation::removeAllWhiteSpace($password);
        if ($this->checkPasswordLength($password)) {
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }
    }

    public function checkPasswordLength($password)
    {
        return Validation::checkStringLength($password, ">=", 4, true);
    }

    public function getHashedPassword()
    {
        return $this->password;
    }
}
