<?php

namespace Vendor\models;

class ProductProvider
{

    public Product $product;
    public Provider $provider;

    public function isNullOrEmpty()
    {
        if (
            !$this->product
            || !$this->provider
        ) {
            return false;

            die;
        }

        return true;
    }
}
