<?php

namespace Vendor\validators;

class Phone
{

    public static function isValid($phone)
    {
        // Check if number is valid from Angola
        // example 923432111 || +244989878888

        return (!preg_match(
            "/^(?:(\+244|00244))?(9)(1|2|3|4|9)([\d]{7,7})$/ix",
            $phone
        )) ? false : true;
    }
}
