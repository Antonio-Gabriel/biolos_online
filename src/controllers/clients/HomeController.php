<?php

namespace Vendor\controllers\clients;

use Vendor\config\RainTpl;
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

        return $template->setTpl("index", [
            "provider" => @$_SESSION["provider"],
            "client" => @$_SESSION["client"]
        ]);
    }
}
