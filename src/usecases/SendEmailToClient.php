<?php

namespace Vendor\usecases;

use Vendor\repositories\PurchaseRepository;

class SendEmailToClient
{
    public function execute(array $authenticatedUser = [])
    {

        $purchaseRepository = new PurchaseRepository();
        return $purchaseRepository->sendEmailToClient($authenticatedUser);
    }
}
