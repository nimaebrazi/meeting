<?php

namespace Meeting\Core;

class Validator
{
    public static function isNull($value)
    {
        return empty($value);
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function string(string $value, int $min = 1, int $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }
}