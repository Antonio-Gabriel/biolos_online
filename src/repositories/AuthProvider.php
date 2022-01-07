<?php

namespace Vendor\repositories;

use Vendor\config\db\Sql;

use Vendor\validators\Password;
use Vendor\interfaces\IAuthProviderRepository;

class AuthProvider implements IAuthProviderRepository
{

    public function login(string $email, string $password)
    {
        $sql = new Sql();

        $response = $sql->select(
            "SELECT * FROM fornecedor f LEFT JOIN 
             conta c ON f.id = c.fornecedor_id WHERE email = :email;",
            [
                ":email" => $email,
            ]
        );

        if (Password::comparePassword($password, $response[0]['password'])) {
            session_regenerate_id();

            // Provider
            $_SESSION["provider"] = $response[0];

            return true;
        }

        return false;
    }

    public function logout()
    {
        session_destroy();
        session_unset();
    }
}
