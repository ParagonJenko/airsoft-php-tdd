<?php

namespace App\Exceptions;

class TypeNotValidException extends \Exception
{
    public function errorMessage()
    {
        return '<b>'.$this->getMessage().'</b> is not of a valid type.';
    }
}
