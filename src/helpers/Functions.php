<?php

use Vendor\usecases\admin\GetProducts;
use Vendor\usecases\GetTotalProductsIntoCart;

function url($endPoint)
{
    return header("Location: http://localhost/bioloOnline/{$endPoint}");
}

// Format price
function formatNumber($num)
{
    return number_format(
        $num,
        2,
        ",",
        "."
    );
}

function GetTotalProductsByProvider(int $provider_id)
{
    $productStorage = [];
    $getProducts = new GetProducts();
    $productsList = $getProducts->execute($provider_id);

    foreach ($productsList as $value) {
        $productObj = (object) $value;
        if ((int)$productObj->estado !== 0) {
            array_push($productStorage, $value);
        }
    }

    return count($productStorage);
}

function GetTotalProductsIntoCart(int $client, int $provider)
{
    $totalProducts = new GetTotalProductsIntoCart();
    return count($totalProducts->execute([
        "client" => $client,
        "provider" => $provider
    ]) ?? []);
}
