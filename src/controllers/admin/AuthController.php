<?php

namespace Vendor\controllers\admin;

use Vendor\config\RainTpl;
use Vendor\usecases\admin\Middleware;
use Psr\Http\Message\ServerRequestInterface;

class AuthController
{
    public function handle(ServerRequestInterface $req)
    {
        $status = $req->getQueryParams()["status"] ?? 0;
        $template = new RainTpl("views/admin/");

        return  $template->setTpl("login-admin", [
            "status_code" => intval($status)
        ]);
    }

    public function auth(ServerRequestInterface $req)
    {
        try {
            $authMiddleware = new Middleware();
            $authMiddleware->login($req->getParsedBody()["email"], $req->getParsedBody()["password"]);
        } catch (\Exception $th) {
            //throw $th;

            echo $th;
        }
    }
}
