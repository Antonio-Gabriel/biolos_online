<?php

use Vendor\usecases\admin\GetProducts;

function url($endPoint)
{
    //echo $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "bioloOnline" . "/";
    return header("Location: http://localhost/bioloOnline/{$endPoint}");
}

// Format price
function formatNumber($num)
{
    return (float)number_format(
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
