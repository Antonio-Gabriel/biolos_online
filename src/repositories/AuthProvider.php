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
            "SELECT f.id, f.nome, f.contacto, f.email, 
             f.rua, f.bairro, f.cidade, c.foto, c.password 
             FROM fornecedor f LEFT JOIN 
             conta c ON f.id = c.fornecedor_id WHERE f.email = :email;",
            [
                ":email" => $email,
            ]
        );

        if (Password::comparePassword($password, $response[0]['password'])) {
            session_start();
            session_regenerate_id();

            // Provider
            $_SESSION["provider"] = $response;

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

        header("Location: login-admin");

        exit();
    }
}
