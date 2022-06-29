<?php

namespace App\Helpers;

class StringHelper
{
    /**
     * Format a federal registration according to its type
     *
     * @param $value
     * @return bool|string
     * @throws Exception
     */
    public static function formatarInscricaoFederal($value)
    {
        $value = StringHelper::onlyNumbers($value);

        if (strlen($value) == 10) {
            $value = str_pad($value, 11, "0", STR_PAD_LEFT);
        }

        switch (strlen($value)) {
            case 11:
                $mask = '###.###.###-##';
                break;
            default:
                $mask = '##.###.###/####-##';
                break;
        }

        return StringHelper::mask($value, $mask);
    }

    /**
     * Mask a string according to a param $mask
     * @param $str
     * @param $mask
     * @return mixed
     */
    public static function mask($str, $mask)
    {
        $str = StringHelper::onlyNumbers($str);
        $str = str_replace(' ', '', $str);

        for ($i = 0; $i < strlen($str); $i++) {
            $mask_pos = strpos($mask, "#");

            if ($mask_pos === false) {
                return null;
            }

            $mask[$mask_pos] = $str[$i];
        }

        return $mask;
    }

    /**
     * remove dots from a string
     * @param $string
     * @return null|string
     */
    public static function onlyNumbers($string)
    {
        return preg_replace('/[^0-9]/i', '', $string);
    }

    /**
     * Returns a string with every first letter in upper case
     * @param $string
     * @return null|string
     */
    public static function firstLetterInUpper($name)
    {
        return ucfirst(strtolower($name));
    }

    /**
     * Returns a string based on the expression given
     * @param $string
     * @param $string
     * @param $int
     * @return null|string
     */

    public static function getText($expression, $string, $position = 1)
    {
        preg_match($expression, $string, $result);

        return isset($result[$position]) ? trim($result[$position]) : null;
    }

    /**
     * Returns if a string is present into another
     * @param $string
     * @param $string
     * @return bool
     */

    public static function checkIfContains($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ($needle !== '' && mb_stripos($haystack, $needle) !== false) {
                return true;
            }
        }

        return false;
    }
}
