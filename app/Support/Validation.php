<?php
namespace App\Models;

class Validation
{
    public static function removeAllWhiteSpace($string)
    {
        return preg_replace('/\s/', '', $string);
    }
}
