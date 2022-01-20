<?php

namespace Vendor\usecases;

use Vendor\repositories\PurchaseRepository;

class RemoveProductsFromCart
{
    public function execute(array $authenticatedUser = [])
    {

        $purchaseRepository = new PurchaseRepository();
        return $purchaseRepository->removeProductFromCart($authenticatedUser);
    }
}
