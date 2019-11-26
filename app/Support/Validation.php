<?php
namespace App\Support;

use App\Exceptions\NotEnoughCharactersException;
use App\Exceptions\TypeNotValidException;

class Validation
{
    public static function removeAllWhiteSpace($string)
    {
        return preg_replace('/\s/', '', $string);
    }

    public static function checkStringLength($string, $operator, $lengthInteger, $returnException = true)
    {
        switch ($operator) {
            case "==":
                if (strlen($string) == $lengthInteger) {
                    return true;
                }
                break;
            case ">=":
                if (strlen($string) >= $lengthInteger) {
                    return true;
                }
                break;
            case "<=":
                if (strlen($string) <= $lengthInteger) {
                    return true;
                }
                break;
            case "!=":
                if (strlen($string) != $lengthInteger) {
                    return true;
                }
                break;
        };
        if ($returnException) {
            throw new NotEnoughCharactersException;
        } else {
            return false;
        }
    }

    public static function checkIfIsType($variable, $type)
    {
        switch ($type) {
            case "string":
                if (is_string($variable)) {
                    return true;
                }
                break;
            case "integer":
                if (is_numeric($variable)) {
                    return true;
                }
                break;
            case "email_address":
                if (filter_var($variable, FILTER_VALIDATE_EMAIL)) {
                    return true;
                }
                break;
        }
        throw new TypeNotValidException;
    }

    public static function checkIfIsNotType($variable, $type)
    {
        switch ($type) {
            case "string":
                if (is_string($variable)) {
                    throw new TypeNotValidException;
                }
                break;
            case "integer":
                if (is_numeric($variable)) {
                    throw new TypeNotValidException;
                }
                break;
            case "email_address":
                if (filter_var($variable, FILTER_VALIDATE_EMAIL)) {
                    throw new TypeNotValidException;
                }
                break;
        }
        return true;
    }
}
