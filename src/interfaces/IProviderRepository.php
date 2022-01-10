<?php

namespace Vendor\interfaces;

interface IProviderRepository
{
    public function get(int $page, int $itemsPerPage);
    public function getBySearch(string $search, int $page, int $itemsPerPage);
}
