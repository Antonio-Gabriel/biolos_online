<?php

namespace Vendor\controllers\clients;

use Vendor\models\Model;
use Vendor\config\RainTpl;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AuthController extends Model
{
    public function handle(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        $template = new RainTpl();

        return $template->draw("login");
    }

    public function auth(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
    }
}
