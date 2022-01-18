<?php

namespace Vendor\models;

use Vendor\models\Category;

class Product
{
    public int $id;
    public int $state;
    public string $price;
    public string $name;
    public string $foto;
    public string $description;

    public Category $category;

    public function __construct(
        int $state,
        string $price,
        string $name,
        string $foto,
        string $description,
        Category $category,
        int $id = 0
    ) {
        $this->id = $id;
        $this->state = $state;
        $this->price = $price;
        $this->name = $name;
        $this->foto = $foto;
        $this->description = $description;
        $this->category = $category;
    }


    public function isNullOrEmpty()
    {
        if (
            !$this->name
            || !$this->price
            || !$this->description
        ) {
            return false;

            die;
        }

        return true;
    }
}
