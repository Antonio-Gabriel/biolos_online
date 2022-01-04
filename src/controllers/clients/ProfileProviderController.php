<?php

namespace Vendor\controllers\clients;

use Vendor\config\RainTpl;

class ProfileProviderController
{
    public function handle($req, $res, $args = [])
    {
        $template = new RainTpl();

        return $template->draw("profile-provider");
    }
}
