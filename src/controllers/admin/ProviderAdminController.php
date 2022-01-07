<?php

namespace Vendor\controllers\admin;

use Vendor\config\RainTpl;
use Vendor\validators\Middleware;

class ProviderAdminController
{

    public function handle()
    {
        Middleware::isProviderAuthenticated();

        $template = new RainTpl("views/admin/");

        return  $template->setTpl("provider-admin", [
            "provider" => $_SESSION["provider"]
        ]);
    }
}
