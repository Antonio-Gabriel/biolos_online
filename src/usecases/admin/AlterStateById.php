<?php

namespace Vendor\usecases\admin;

use Vendor\repositories\ProductRepository;

class AlterStateById
{
    public function execute(int $product_id, int $state)
    {

        $productRepository = new ProductRepository();
        return $productRepository->alterStateById($product_id, $state);
    }
}
