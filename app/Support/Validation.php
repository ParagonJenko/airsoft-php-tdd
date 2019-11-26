<?php
namespace App\Support;

use App\Exceptions\NotEnoughCharactersException;

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

    public static function checkIfNotType($variable, $type, $returnException = true)
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

        if ($returnException) {
            throw new TypeNotValidException;
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
}
