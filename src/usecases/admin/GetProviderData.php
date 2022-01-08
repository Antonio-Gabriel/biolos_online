<?php

namespace Vendor\usecases\admin;

use Vendor\repositories\AdminRepository;

class GetProviderData
{
    public function execute(int $provider_id)
    {

        $adminRepository = new AdminRepository();
        return $adminRepository->get($provider_id);
    }
}
