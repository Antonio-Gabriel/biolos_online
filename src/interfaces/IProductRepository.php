<?php

namespace Vendor\interfaces;

use Vendor\models\ProductProvider;

interface IProductRepository
{
    public function create(ProductProvider $product);
    public function update(ProductProvider $product);
    public function delete(int $produto_id);    

    public function get(int $provider_id);
    public function getbyId(int $provider_id);
    public function getByCategory(int $provider_id);
    public function getProductDetailsByProvider(int $product_id, int $provider_id);    
}
