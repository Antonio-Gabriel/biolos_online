<?php

namespace Vendor\usecases;

use Vendor\repositories\ProductGlobalRepository;

class GetGlobalProducts
{
    public function execute(int $page)
    {

        $productGlobalRepository = new ProductGlobalRepository();
        return $productGlobalRepository->getPaginate($page);
    }
}
