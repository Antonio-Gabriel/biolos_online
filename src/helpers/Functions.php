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
    $getProducts = new GetProducts();
    return count($getProducts->execute($provider_id));
}
