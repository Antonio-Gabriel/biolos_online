<?php

namespace Vendor\usecases\admin;

use Vendor\repositories\AuthProvider;

class Middleware
{
    public function login(string $email, string $password)
    {
        $authProvider = new AuthProvider();
        $isPermited = $authProvider->login($email, $password);

        if ($isPermited) {

            header("Location: provider-admin");

            exit();
        }

        header("Location: login-admin?status=401");

        exit();
    }
}
