<?php
namespace App\Support;

class Validation
{
    public static function removeAllWhiteSpace($string)
    {
        return preg_replace('/\s/', '', $string);
    }

    public static function checkStringLength($string, $operator, $lengthInteger)
    {
        switch ($operator) {
            case "==": return strlen($string) == $lengthInteger;
            case ">=": return strlen($string) >= $lengthInteger;
            case "<=": return strlen($string) <= $lengthInteger;
            case "!=": return strlen($string) != $lengthInteger;
        };
    }
}
