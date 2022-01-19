<?php

namespace Vendor\controllers\clients;

use Vendor\config\RainTpl;

use Vendor\usecases\GetAllProviders;
use Vendor\usecases\GetGlobalProducts;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController
{
    public function handle(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        $template = new RainTpl();

        $allProviders = new GetAllProviders();
        $providers = $allProviders->execute();

        $globalProducts = new GetGlobalProducts();
        $products = $globalProducts->execute(1);

        return $template->setTpl("index", [
            "provider" => @$_SESSION["provider"],
            "client" => @$_SESSION["client"],
            "providers" => $providers,
            "products" => $products["data"]
        ]);
    }
}
