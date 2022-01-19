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
        $status = $req->getQueryParams()["status"] ?? 0;
        $template = new RainTpl();

        return $template->setTpl("login", [
            "status_code" => intval($status)
        ]);
    }

    public function auth(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        var_dump($req->getParsedBody());
    }
}
