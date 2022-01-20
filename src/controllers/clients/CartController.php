<?php

namespace Vendor\controllers\clients;

use Vendor\config\RainTpl;

use Vendor\validators\Middleware;
use Vendor\usecases\AddProductIntoCart;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CartController
{
    public function handle(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        $status = $req->getQueryParams()["status"] ?? 0;
        $template = new RainTpl();

        return $template->setTpl("cart", [
            "provider" => @$_SESSION["provider"],
            "client" => @$_SESSION["client"],
            "status_code" => intval($status)
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
