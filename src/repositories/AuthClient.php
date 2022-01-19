<?php

namespace Vendor\repositories;

use Vendor\config\db\Sql;
use Vendor\interfaces\IAuthClientRepository;

class AuthClient implements IAuthClientRepository
{

    public function login(string $username, string $email)
    {
        $sql = new Sql();

        $response = $sql->select(
            "SELECT *FROM cliente
             WHERE nome = :username AND email = :email;",
            [
                ":username" => $username,
                ":email" => $email,
            ]
        );

        if ($response) {
            session_start();
            session_regenerate_id();

            // Client
            $_SESSION["client"] = $response;

            return true;
        }

        return false;
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(), '', 0, '/');
        session_regenerate_id(true);

        unset($_SESSION);

        header("Location: login");

        exit();
    }
}
