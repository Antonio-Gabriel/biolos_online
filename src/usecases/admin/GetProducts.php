<?php

namespace Vendor\usecases\admin;

use Vendor\repositories\ProductRepository;

class GetProducts
{
    public function execute(int $provider_id)
    {

        $productRepository = new ProductRepository();
        return $productRepository->get($provider_id);
    }
}
