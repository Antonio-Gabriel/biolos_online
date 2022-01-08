<?php

namespace Vendor\models;

class Category
{

    public int $id;
    public string $name;

    public function __construct(int $id = 0, string $name = "")
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function isNullOrEmpty()
    {
        if (!$this->name) {
            return false;

            die;
        }

        return true;
    }
}
