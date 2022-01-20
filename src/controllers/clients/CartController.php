<?php

namespace Vendor\controllers\clients;

use Vendor\config\RainTpl;

use Vendor\validators\Middleware;
use Vendor\usecases\AddProductIntoCart;

use Vendor\usecases\GetProductsFromCart;
use Vendor\usecases\RemoveProductFromCart;
use Vendor\usecases\UpdateQuantityOfProductFromCart;

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

        $this->updateCurrentQuantity($req->getQueryParams());

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
        try {

            $removeProductFromCart = new RemoveProductFromCart();
            $response = $removeProductFromCart->execute(intval($args["product"]));

            if ($response) {

                header("Location: /bioloOnline/cart?status=201");
                exit();
            }

            header("Location: /bioloOnline/cart?status=400");
            exit();
        } catch (\Exception $th) {
            echo $th;
        }
    }

    public function finishPurchase(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        $template = new RainTpl("views/email/");

        // https://api.whatsapp.com/send?phone=+244942802448&text=Testando&source=&data=

        // var_dump($args);

        // if (@$_SESSION["client"][0]["id"]) {
        //     echo "client";
        // } else {
        // }

        return $template->setTpl("purchase-list");
    }

    private function updateCurrentQuantity(array $args = [])
    {

        if (isset($args["ac"]) && isset($args["qtd"]) && isset($args["prd"])) {
            if ($args["ac"] === "add") {
                $newQtd = intval($args["qtd"]) + 1;
            }

            if ($args["ac"] === "rem") {
                if (intval($args["qtd"]) > 1) {
                    $newQtd = intval($args["qtd"]) - 1;
                } else {
                    $newQtd = 1;
                }
            }

            $updateQuantityOfProductFromCart = new UpdateQuantityOfProductFromCart();
            $response = $updateQuantityOfProductFromCart->execute($newQtd, intval($args["prd"]));

            if ($response) {
                header("Location: /bioloOnline/cart");
                exit();
            }
        }
    }
}
