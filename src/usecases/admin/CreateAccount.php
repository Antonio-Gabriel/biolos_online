<?php

namespace Vendor\usecases\admin;

use Vendor\models\Account;
use Vendor\models\Provider;

use Vendor\repositories\AdminRepository;

class CreateAccount
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

        if ($adminRepository->verifyExistentProvider($account->provider->email)) {
            throw new \Exception("Existent Provider", 23000);
        }

        $response = $adminRepository->create($account);

        if ($response) {
            return true;

            die();
        }
    }
}
