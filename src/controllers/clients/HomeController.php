<?php

namespace Vendor\controllers\clients;

use Vendor\config\RainTpl;

use Vendor\usecases\GetAllProviders;
use Vendor\usecases\GetGlobalProducts;

class HomeController
{
    public function handle()
    {
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
