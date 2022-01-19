<?php

namespace Vendor\repositories;

use Vendor\config\db\Sql;

use Vendor\validators\Email;
use Vendor\validators\Phone;
use Vendor\validators\Password;

use Vendor\models\Account;

use Vendor\interfaces\IAdminRepository;

class AdminRepository implements IAdminRepository
{
    private Sql $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function create(Account $account)
    {
        if (!$account->provider->isNullOrEmpty()) {
            throw new \Exception("Preencha devidamente os campos", 400);
        }

        if (
            !Phone::isValid(strval($account->provider->contact))
            || !Email::isValid($account->provider->email)
        ) {
            throw new \Exception("Email ou telefone incorreto!", 400);
        }

        $execute_query = $this->sql->query(
            "INSERT INTO fornecedor (nome, contacto, email, rua, bairro, cidade) 
             VALUES (:nome, :contacto, :email, :rua, :bairro, :cidade);",
            [
                ":nome" => $account->provider->name,
                ":contacto" => $account->provider->contact,
                ":email" => $account->provider->email,
                ":rua" => $account->provider->road,
                ":bairro" => $account->provider->district,
                ":cidade" => $account->provider->city
            ]
        );

        $account->provider->id = $this->sql->select("SELECT last_insert_id() as 'id';")[0]["id"];

        $execute_query_join = $this->sql->query(
            "INSERT INTO conta (foto, fotocapa, password, fornecedor_id) 
             VALUES (:foto, :fotocapa, :password, :fornecedor);",
            [
                ":foto" => $account->foto,
                ":fotocapa" => "capa.png",
                ":password" => Password::isValid($account->password),
                ":fornecedor" => $account->provider->id
            ]
        );

        $stmt_response = [$execute_query, $execute_query_join];

        return $stmt_response;
    }

    public function update(Account $account)
    {
        if (!$account->provider->isNullOrEmpty()) {
            throw new \Exception("Preencha devidamente os campos", 14);
        }

        if (
            !Phone::isValid(strval($account->provider->contact))
            || !Email::isValid($account->provider->email)
        ) {
            throw new \Exception("Email ou telefone incorreto!", 15);
        }

        if ($account->password) {
            $execute_query = $this->sql->query(
                "UPDATE fornecedor f INNER JOIN conta c
                 ON f.id = c.fornecedor_id SET 
                 f.nome = :nome, f.contacto = :contacto, f.email = :email,
                 f.rua = :rua, f.bairro = :bairro, f.cidade = :cidade,
                
                 c.foto = :foto, c.password = :password
                 WHERE f.id = :provider_id;
                ",
                [
                    ":provider_id" => $account->provider->id,
                    ":nome" => $account->provider->name,
                    ":contacto" => $account->provider->contact,
                    ":email" => $account->provider->email,
                    ":rua" => $account->provider->road,
                    ":bairro" => $account->provider->district,
                    ":cidade" => $account->provider->city,
                    ":foto" => $account->foto,
                    ":password" => Password::isValid($account->password)
                ]
            );
        } else {
            $execute_query = $this->sql->query(
                "UPDATE fornecedor f INNER JOIN conta c
                 ON f.id = c.fornecedor_id SET 
                 f.nome = :nome, f.contacto = :contacto, f.email = :email,
                 f.rua = :rua, f.bairro = :bairro, f.cidade = :cidade,
                
                 c.foto = :foto
                 WHERE f.id = :provider_id;
                ",
                [
                    ":provider_id" => $account->provider->id,
                    ":nome" => $account->provider->name,
                    ":contacto" => $account->provider->contact,
                    ":email" => $account->provider->email,
                    ":rua" => $account->provider->road,
                    ":bairro" => $account->provider->district,
                    ":cidade" => $account->provider->city,
                    ":foto" => $account->foto,
                ]
            );
        }

        return $execute_query;
    }

    public function getCurrentProvider(int $provider_id)
    {
        return $this->sql->select(
            "SELECT f.id, f.nome, f.contacto, f.email, 
             f.rua, f.bairro, f.cidade, c.foto, c.password  
             FROM fornecedor f LEFT JOIN 
             conta c ON f.id = c.fornecedor_id WHERE f.id = :id;",
            [
                ":id" => $provider_id,
            ]
        );
    }

    public function get(int $provider_id)
    {
        return $this->sql->select(
            "SELECT *FROM conta WHERE id = :provider_id",
            [
                ":provider_id" => $provider_id
            ]
        );
    }  

    public function delete(int $provider_id)
    {
        // Remove profile
    }

    public function verifyExistentProvider($email)
    {
        return ($this->sql->select('SELECT * FROM fornecedor WHERE email = :email', [':email' => $email])) ? true : false;
    }
}
