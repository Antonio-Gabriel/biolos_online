<?php

namespace Vendor\usecases\client;

use Vendor\repositories\ClientRepository;

class RemoveClient
{

    public function execute(int $id): bool
    {
        $clientRepository = new ClientRepository();
        $response = $clientRepository->delete($id);

        if ($response) {
            return true;

            die();
        }

        return false;
    }
}
