<?php

namespace Vendor\usecases;

use Vendor\repositories\CategoryRepository;

class GetCategories
{

    public function execute()
    {
        $categoryRepository = new CategoryRepository();
        return $categoryRepository->get();
    }
}
