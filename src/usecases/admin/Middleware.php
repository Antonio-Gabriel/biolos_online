<?php

namespace Vendor\usecases\admin;

use Vendor\repositories\AuthProvider;

class Middleware
{

    private $authProvider;

    public function __construct()
    {
        $this->authProvider = new AuthProvider();
    }

    public function login(string $email, string $password)
    {
        $isPermited = $this->authProvider->login($email, $password);

        if ($isPermited) {

            header("Location: provider-admin");

            exit();
        }

        header("Location: login-admin?status=401");

        exit();
    }

    public function logout()
    {
        $this->authProvider->logout();
    }
}
