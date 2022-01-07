<?php

namespace Vendor\usecases\client;

use Vendor\models\Client;
use Vendor\repositories\ClientRepository;

class CreateClient
{

    public function execute(string $name, string $email, string $contact): bool
    {
        $client = new Client();
        $client->name = $name;
        $client->email = $email;
        $client->contact = $contact;

        $clientRepository = new ClientRepository();
        if ($clientRepository->verifyExistentClient($client->email)) {
            throw new \Exception("Existent Client", 23000);
        }

        $response = $clientRepository->create($client);

        if ($response) {
            return true;

            die();
        }
    }
}
