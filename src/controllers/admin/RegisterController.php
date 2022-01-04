<?php

namespace Vendor\controllers\admin;

use Vendor\config\RainTpl;

class RegisterController
{
    public function handle($req, $res, $args = [])
    {
        $template = new RainTpl("views/admin/");

        return  $template->draw("register-admin");
    }
}
