<?php

namespace Vendor\usecases\admin;

use Vendor\repositories\ProductRepository;

class DeleteProduct
{
    public function execute(int $product_id)
    {

        $productRepository = new ProductRepository();
        return $productRepository->delete($product_id);
    }
}
