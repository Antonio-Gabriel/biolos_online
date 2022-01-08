<?php

namespace Vendor\repositories;

use Vendor\config\db\Sql;

use Vendor\interfaces\ICategoryRepository;

class CategoryRepository implements ICategoryRepository
{
    private Sql $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function get()
    {
        return $this->sql->select("SELECT DISTINCT *FROM categoria");
    }
}
