<?php

namespace Vendor\controllers\clients;

use Vendor\config\RainTpl;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductDetailController
{
    public function handle(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        $template = new RainTpl();

        return $template->setTpl("product-detail", [
            "provider" => @$_SESSION["provider"],
        ]);
    }
}
