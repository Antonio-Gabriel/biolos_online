<?php

namespace Vendor\controllers\admin;

use Vendor\config\RainTpl;

class AuthController
{
    public function handle($req, $res, $args = [])
    {
        $template = new RainTpl("views/admin/");

        return  $template->draw("login-admin");
    }
}
