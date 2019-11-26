<?php

namespace App\Exceptions;

class NotEnoughCharactersException extends \Exception
{
    public function errorMessage()
    {
        return '<b>'.$this->getMessage().'</b> has not got enough characters.';
    }
}
