<?php

namespace Vendor\usecases\client;

use Vendor\repositories\AuthClient;

class Middleware
{

    private $authClient;

    public function __construct()
    {
        $this->authClient = new AuthClient();
    }

    public function login(string $username, string $email)
    {
        $isPermited = $this->authClient->login($username, $email);

        if ($isPermited) {

            header("Location: home");

            exit();
        }

        header("Location: login?status=401");

        exit();
    }

    public function logout()
    {
        $this->authClient->logout();
    }
}
