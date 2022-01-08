<?php

namespace Vendor\models;

class ProductProvider
{

    public Product $product;
    public Provider $provider;

    public function __construct(Product $product, Provider $provider)
    {
        $this->product = $product;
        $this->provider = $provider;
    }
}
