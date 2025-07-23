<?php

namespace App\Helpers;

class EncryptHelper
{
    public static function encrypt($value)
    {
        return encrypt($value); // pakai Laravel built-in encryption
    }

    public static function decrypt($value)
    {
        return decrypt($value);
    }
}
