<?php

namespace Vendor\usecases;

use Vendor\repositories\ProviderRepository;

class GetAllProviders
{

    public function execute()
    {
        $providerRepository = new ProviderRepository();
        return $providerRepository->getAllProviders();
    }
}
