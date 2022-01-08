<?php

namespace Vendor\validators;

class Password
{

    public static function isValid($password)
    {

        if (preg_match(
            "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/ix",
            $password
        )) {

            return self::encrypt($password);
        }

        return false;
        die;
    }

    public static function checkPass($password)
    {
        return (!preg_match(
            "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/ix",
            $password
        )) ? false : true;
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
