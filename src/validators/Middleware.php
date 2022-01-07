<?php

namespace Vendor\validators;

class Middleware
{
    public static function isProviderAuthenticated()
    {
        if (!isset($_SESSION["provider"])) {

            header("Location: login-admin");
            exit();
        }
    }

    public static function redirectToDashboard()
    {
        if (isset($_SESSION["provider"])) {

            header("Location: provider-admin");
            exit();
        }
    }
}
