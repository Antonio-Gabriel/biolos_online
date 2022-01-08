<?php

namespace Vendor\usecases\admin;

use Vendor\models\Account;
use Vendor\models\Provider;

use Vendor\repositories\AdminRepository;

class UpdateAccount
{
    public function execute(
        string $foto,
        string $password,
        Provider $provider
    ) {
        $account = new Account();
        $account->foto = $foto;
        $account->password = $password;
        $account->provider = $provider;

        $adminRepository = new AdminRepository();

        $response = $adminRepository->update($account);

        if ($response) {
            return true;

            die();
        }
    }
}
