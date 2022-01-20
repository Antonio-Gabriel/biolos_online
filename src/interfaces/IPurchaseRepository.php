<?php

namespace Vendor\interfaces;

use Vendor\models\Purchase;

interface IPurchaseRepository
{
    public function addProductIntoCart(Purchase $purchase);
    public function showProductIntoCart(array $authenticatedUser);
    public function removeProductIntoCart(int $product_id);
    public function updateQuantityOfProductFromCart(int $quantity, int $product_id);

    public function removeProductFromCart(array $authenticatedUser = []);
    public function sendEmailToClient(array $authenticatedUser = []);
}
