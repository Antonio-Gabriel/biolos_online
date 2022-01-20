<?php

namespace Vendor\usecases;

use Vendor\repositories\PurchaseRepository;

class GetProductsFromCart
{
    public function execute(int $client, int $provider)
    {

        $purchaseRepository = new PurchaseRepository();
        return $purchaseRepository->showProductIntoCart([
            "client" => $client,
            "provider" => $provider
        ]);
    }
}
