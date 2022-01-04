<?php

namespace Vendor\controllers\admin;

use Vendor\config\RainTpl;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class RegisterController
{
    public function handle(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        $template = new RainTpl("views/admin/");

        return  $template->draw("register-admin");
    }
}
