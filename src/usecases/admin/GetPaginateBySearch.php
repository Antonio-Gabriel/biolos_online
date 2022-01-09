<?php

namespace Vendor\usecases\admin;

use Vendor\repositories\ProductRepository;

class GetPaginateBySearch
{
    public function execute(string $search, int $provider_id, int $category_id, int $page)
    {

        $productRepository = new ProductRepository();
        return $productRepository->getPaginateBySearch($search, $provider_id, $category_id, $page);
    }
}
