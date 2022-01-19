<?php

namespace Vendor\controllers\clients;

use Vendor\config\RainTpl;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use Vendor\usecases\GetDetailtsOfProduct;

class ProductDetailController
{
    public function handle(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        $template = new RainTpl();

        $productDetailsData = new GetDetailtsOfProduct();
        $product = $productDetailsData->execute(intval($args["provider"]), intval($args["id"]));

        return $template->setTpl("product-detail", [
            "provider" => @$_SESSION["provider"],
            "client" => @$_SESSION["client"],
            "product" => $product,
        ]);
    }
}
