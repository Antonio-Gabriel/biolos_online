<?php

namespace Vendor\validators;

class Middleware
{
    public static function isProviderAuthenticated(): bool
    {
        if (!isset($_SESSION["provider"])) {
            return false;

            die();
        }

        return true;
    }
}
