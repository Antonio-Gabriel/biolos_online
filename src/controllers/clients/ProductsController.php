<?php

namespace Vendor\controllers\clients;

use Vendor\config\RainTpl;

class ProductsController
{
    public function handle($req, $res, $args = [])
    {
        $template = new RainTpl();

        return $template->draw("products");
    }
}
