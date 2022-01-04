<?php

namespace Vendor\models;

class Product
{
    public int $id;
    public int $state;
    public float $price;
    public string $name;
    public string $description;
    public string $foto;

    public function isNullOrEmpty()
    {

        if (
            !$this->name
            || !$this->price
            || !$this->state
            || !$this->description
            || !$this->foto
        ) {
            return false;

            die;
        }

        return true;
    }
}
