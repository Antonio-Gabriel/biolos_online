<?php

namespace Vendor\usecases\admin;

use Vendor\repositories\AdminRepository;

class GetCurrentProvider
{
    public function execute(int $provider_id)
    {

        $adminRepository = new AdminRepository();
        return $adminRepository->getCurrentProvider($provider_id);
    }
}
