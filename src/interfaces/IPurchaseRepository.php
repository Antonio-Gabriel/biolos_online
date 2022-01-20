<?php

namespace Vendor\interfaces;

use Vendor\models\Purchase;
use Vendor\models\ProductProvider;

interface IPurchaseRepository
{
    public function addProductIntoCart(Purchase $purchase);
    public function showProductIntoCart(array $authenticatedUser);
    public function removeProductIntoCart(int $product_id);
    public function updateQuantityOfProductIntoCart(Purchase $purchase);

    public function sendMessageToProvider(ProductProvider $productProvider);
}
