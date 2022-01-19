<?php

namespace Vendor\usecases;

use Vendor\repositories\ProductRepository;

class GetTotalProductsIntoCart
{

    public function execute(int $authenticatedUserId)
    {
        $productRepository = new ProductRepository();
        return $productRepository->getProductsIntoCart($authenticatedUserId);
    }
}
