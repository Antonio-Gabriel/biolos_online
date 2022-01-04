<?php

namespace Vendor\interfaces;

use Vendor\models\Client;

interface IClientRepository
{
    public function create(Client $client);
    public function delete(int $client_id);
}
