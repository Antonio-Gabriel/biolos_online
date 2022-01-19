<?php

namespace Vendor\interfaces;

interface IProductGlobalRepository
{
    public function getPaginate(int $page, int $itemsPerPage);
    public function getPaginateBySearch(string $search, int $category_id, int $page, int $itemsPerPage);
}
