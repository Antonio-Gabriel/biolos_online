<?php

namespace Vendor\controllers\admin;

use Vendor\config\RainTpl;
use Vendor\validators\Middleware;

class ProductController
{

    public function handle()
    {
        Middleware::isProviderAuthenticated();

        $template = new RainTpl("views/admin/");

        return  $template->setTpl("add-product", [
            "provider" => $_SESSION["provider"]
        ]);
    }
}
