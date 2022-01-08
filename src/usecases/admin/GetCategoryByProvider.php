<?php

namespace Vendor\usecases\admin;

use Vendor\repositories\ProductRepository;

class GetCategoryByProvider
{
    public function execute(int $provider_id)
    {

        $productRepository = new ProductRepository();
        return $productRepository->getByCategory($provider_id);
    }
}
