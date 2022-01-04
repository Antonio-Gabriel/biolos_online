<?php

namespace Vendor\validators;

class Password
{

    public static function isValid($password): bool | string
    {

        if (strlen($password) < 6) {

            return false;
            die;
        }

        return Password::encrypt($password);
    }

    private static function encrypt($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function comparePassword($pass, $hash)
    {
        return password_verify($pass, $hash);
    }
}
