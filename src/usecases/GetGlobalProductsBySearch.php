<?php

namespace Vendor\usecases;

use Vendor\repositories\ProductGlobalRepository;

class GetGlobalProductsBySearch
{
    public function execute(string $search, int $category_id, int $page)
    {

        $productGlobalRepository = new ProductGlobalRepository();
        return $productGlobalRepository->getPaginateBySearch($search, $category_id, $page);
    }
}
