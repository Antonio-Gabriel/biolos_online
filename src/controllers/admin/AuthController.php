<?php

namespace Vendor\controllers\admin;

use Vendor\config\RainTpl;
use Vendor\usecases\admin\Middleware;
use Vendor\validators\Middleware as AuthMiddleware;

use Psr\Http\Message\ServerRequestInterface;

class AuthController
{
    private $middleware;

    public function __construct()
    {
        $this->middleware = new Middleware();
    }

    public function handle(ServerRequestInterface $req)
    {
        AuthMiddleware::redirectToDashboard();

        $status = $req->getQueryParams()["status"] ?? 0;
        $template = new RainTpl("views/admin/");

        return  $template->setTpl("login-admin", [
            "status_code" => intval($status)
        ]);
    }

    public function auth(ServerRequestInterface $req)
    {
        try {
            $this->middleware->login($req->getParsedBody()["email"], $req->getParsedBody()["password"]);
        } catch (\Exception $th) {
            //throw $th;

            echo $th;
        }
    }

    public function logout()
    {
        $this->middleware->logout();
    }
}
