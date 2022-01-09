<?php

namespace Vendor\usecases\admin;

use Vendor\repositories\ProductRepository;

class GetPaginate
{
    public function execute(int $page, int $provider_id)
    {

        $productRepository = new ProductRepository();
        return $productRepository->getPaginate($page, $provider_id);
    }
}
