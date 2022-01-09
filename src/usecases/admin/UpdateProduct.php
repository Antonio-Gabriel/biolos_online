<?php

namespace Vendor\usecases\admin;

use Vendor\models\Product;
use Vendor\models\Provider;
use Vendor\models\ProductProvider;

use Vendor\repositories\ProductRepository;

class UpdateProduct
{
    public function execute(
        Product $product,
        Provider $provider
    ) {

        $productRepository = new ProductRepository();

        $response = $productRepository->update(new ProductProvider($product, $provider));

        if ($response) {
            return true;

            die();
        }
    }
}
