<?php

namespace Vendor\controllers\clients;

use Vendor\models\Model;
use Vendor\config\RainTpl;
use Vendor\usecases\client\Middleware;
use Vendor\validators\Middleware as AuthMiddleware;

use Psr\Http\Message\ServerRequestInterface;

class AuthController extends Model
{

    public function __construct()
    {
        $this->middleware = new Middleware();
    }

    public function handle(ServerRequestInterface $req)
    {
        AuthMiddleware::redirectToHome();

        $status = $req->getQueryParams()["status"] ?? 0;
        $template = new RainTpl();

        return $template->setTpl("login", [
            "status_code" => intval($status)
        ]);
    }

    public function auth(ServerRequestInterface $req)
    {
        try {
            $this->middleware->login($req->getParsedBody()["name"], $req->getParsedBody()["email"]);
        } catch (\Exception $th) {
            echo $th;
        }
    }

    public function logout()
    {
        $this->middleware->logout();
    }
}
