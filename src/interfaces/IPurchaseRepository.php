<?php

namespace Vendor\interfaces;

use Vendor\models\Purchase;
use Vendor\models\ProductProvider;

interface IPurchaseRepository
{
    public function addProductIntoCart(Purchase $purchase);
    public function sendMessageToProvider(ProductProvider $productProvider);
}
