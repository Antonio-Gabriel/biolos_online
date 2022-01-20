<?php

namespace Vendor\usecases;

use Vendor\repositories\PurchaseRepository;

class GetProductsByPurchaseFromProvider
{
    public function execute(string $email, int $id)
    {

        $purchaseRepository = new PurchaseRepository();
        return $purchaseRepository->getProductsByPurchaseFromProvider($email, $id);
    }
}
