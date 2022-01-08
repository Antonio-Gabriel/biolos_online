<?php

namespace Vendor\usecases;

use Vendor\repositories\ProductRepository;

class GetDetailtsOfProduct
{

    public function execute(int $provider_id, int $product_id)
    {
        $productRepository = new ProductRepository();
        return $productRepository->getProductDetailsByProvider($product_id, $provider_id);
    }
}
