<?php

namespace Vendor\usecases;

use Vendor\repositories\PurchaseRepository;

class RemoveProductFromCart
{
    public function execute(int $product_id)
    {

        $purchaseRepository = new PurchaseRepository();
        return $purchaseRepository->removeProductIntoCart($product_id);
    }
}
