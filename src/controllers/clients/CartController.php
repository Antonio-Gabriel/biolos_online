<?php

namespace Vendor\controllers\clients;

use Vendor\config\RainTpl;

use Vendor\validators\Middleware;
use Vendor\usecases\AddProductIntoCart;

use Vendor\usecases\GetProductsFromCart;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CartController
{
    public function handle(ServerRequestInterface $req)
    {
        $status = $req->getQueryParams()["status"] ?? 0;
        $template = new RainTpl();

        $getProductsFromCart = new GetProductsFromCart();
        $products = $getProductsFromCart->execute(
            @intval($_SESSION["client"][0]["id"]) ?? 0,
            @intval($_SESSION["provider"][0]["id"]) ?? 0
        );

        $totalInStorage = [];
        foreach ($products as $product) {

            $numberFormat = (str_contains($product["total"], "."))
                ? str_replace(".", "", $product["total"])
                : $product["total"];

            $removeCommaFromPrice = (str_contains($numberFormat, ","))
                ? substr($numberFormat, 0, strlen($numberFormat) - 3)
                : $numberFormat;

            array_push($totalInStorage, (int)$removeCommaFromPrice);
        }

        $generalTotal = array_sum($totalInStorage);

        return $template->setTpl("cart", [
            "provider" => @$_SESSION["provider"],
            "client" => @$_SESSION["client"],
            "status_code" => intval($status),
            "products" => $products,
            "total" => $generalTotal
        ]);
    }

    public function addToCart(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        Middleware::hasAuthenticated();

        try {

            $addProductIntoCart = new AddProductIntoCart();
            $response = $addProductIntoCart->execute(
                intval($args["product"]),
                intval(@$_SESSION["client"][0]["id"] ?? 0),
                intval(@$_SESSION["provider"][0]["id"] ?? 0)
            );

            if ($response) {

                header("Location: /bioloOnline/cart?status=200");
                exit();
            }

            header("Location: /bioloOnline/cart?status=400");
            exit();
        } catch (\Exception $th) {
            echo $th;
        }
    }

    public function removeProductToCart(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
    }
}
