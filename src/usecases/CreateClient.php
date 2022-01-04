<?php

namespace Vendor\usecases;

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
        $response = $clientRepository->create($client);

        if ($response) {
            return true;

            die();
        }

        if ($clientRepository->verifyExistentClient($client->email)) {
            throw new \Exception("Existent Client", 23000);
        }
    }
}
