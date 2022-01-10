<?php

namespace Vendor\usecases;

use Vendor\repositories\ProviderRepository;

class GetProviders
{

    public function execute(int $page)
    {
        $providerRepository = new ProviderRepository();
        return $providerRepository->get($page);
    }
}
