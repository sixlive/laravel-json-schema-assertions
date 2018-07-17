<?php

namespace sixlive\Laravel\JsonSchemaAssertions\Support;

class Str
{
    /**
     * Test to see if a string is json.
     *
     * @param  string  $string
     *
     * @return bool
     */
    public static function isJson($string)
    {
        json_decode($string);

        return json_last_error() === JSON_ERROR_NONE;
    }
}
