<?php

namespace Vendor\validators;

class Email
{

    public static function isValid($email)
    {
        // Check valid email address example
        // osvaldo@gmail.com || osvaldo@gmail.com.br

        return (!preg_match(
            "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",
            $email
        )) ? false : true;
    }
}
