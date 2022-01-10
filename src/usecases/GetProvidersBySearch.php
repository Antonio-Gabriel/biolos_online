<?php

namespace Vendor\usecases;

use Vendor\repositories\ProviderRepository;

class GetProvidersBySearch
{

    public function execute(string $search, int $page)
    {
        $providerRepository = new ProviderRepository();
        return $providerRepository->getBySearch($search, $page);
    }
}
