<?php

namespace Vendor\usecases;

use Vendor\repositories\PurchaseRepository;

class GetProductsByPurchaseFromProviderLocal
{
    public function execute(string $email, int $id)
    {

        $purchaseRepository = new PurchaseRepository();
        return $purchaseRepository->getProductsByPurchaseFromProviderLocal($email, $id);
    }
}
