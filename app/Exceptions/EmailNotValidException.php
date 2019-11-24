<?php

namespace App\Exceptions;

class EmailNotValidException extends \Exception
{
    public function errorMessage()
    {
        return '<b>'.$this->getMessage().'</b> is not a valid email address.';
    }
}
