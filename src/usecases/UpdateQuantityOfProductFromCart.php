<?php

namespace Vendor\usecases;

use Vendor\repositories\PurchaseRepository;

class UpdateQuantityOfProductFromCart
{
    public function execute(int $quantity, int $product_id)
    {

        $purchaseRepository = new PurchaseRepository();
        return $purchaseRepository->updateQuantityOfProductFromCart($quantity, $product_id);
    }
}
