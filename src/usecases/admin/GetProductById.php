<?php

namespace Vendor\usecases\admin;

use Vendor\repositories\ProductRepository;

class GetProductById
{
    public function execute(int $product_id)
    {

        $productRepository = new ProductRepository();
        return $productRepository->getbyId($product_id);
    }
}
