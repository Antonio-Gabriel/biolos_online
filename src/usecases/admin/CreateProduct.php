<?php

namespace Vendor\usecases\admin;

use Vendor\models\Product;
use Vendor\models\Provider;
use Vendor\models\ProductProvider;

use Vendor\repositories\ProductRepository;

class CreateProduct
{
    public function execute(
        Product $product,
        Provider $provider
    ) {

        $productRepository = new ProductRepository();

        if (
            $productRepository->verifyExistentProduct(
                $product->name,
                $product->category->id,
                $provider->id
            )
        ) {
            throw new \Exception("Existent Product", 23000);
        }

        $response = $productRepository->create(new ProductProvider($product, $provider));

        if ($response) {
            return true;

            die();
        }
    }
}
