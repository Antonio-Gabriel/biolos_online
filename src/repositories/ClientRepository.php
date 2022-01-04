<?php

namespace Vendor\repositories;

use Vendor\config\db\Sql;
use Vendor\models\Client;
use Vendor\validators\Email;
use Vendor\validators\Phone;
use Vendor\interfaces\IClientRepository;

class ClientRepository implements IClientRepository
{
    private Sql $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function create(Client $client)
    {
        if (!$client->isNullOrEmpty()) {
            throw new \Exception("Preencha devidamente os campos", 400);
        }

        if (
            !Phone::isValid(strval($client->contact))
            || !Email::isValid($client->email)
        ) {
            throw new \Exception("Email ou telefone incorreto!", 400);
        }

        return $this->sql->query(
            "
            INSERT INTO cliente (nome, email, contacto)
            values (:nome, :email, :contacto);
            ",
            [
                ":nome" => $client->name,
                ":email" => $client->email,
                ":contacto" => $client->contact
            ]
        );
    }

    public function verifyExistentClient($email)
    {
        return ($this->sql->select('SELECT * FROM cliente WHERE email = :email', [':email' => $email])) ? true : false;
    }

    public function delete(int $client_id)
    {
        
    }
}
