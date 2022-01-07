<?php

namespace Vendor\controllers\admin;

ini_set('display_errors', 1);
error_reporting(E_ALL);

use Vendor\config\RainTpl;
use Vendor\models\Provider;
use Vendor\usecases\admin\CreateAccount;

use Psr\Http\Message\ServerRequestInterface;

class RegisterController
{
    public function handle(ServerRequestInterface $req)
    {

        $status = $req->getQueryParams()["status"] ?? 0;
        $template = new RainTpl("views/admin/");

        return  $template->setTpl("register-admin", [
            "status_code" => intval($status)
        ]);
    }

    public function create(ServerRequestInterface $req)
    {

        try {

            $provider = new Provider(
                $req->getParsedBody()["contact"],
                $req->getParsedBody()["name"],
                $req->getParsedBody()["email"],
                $req->getParsedBody()["state"],
                $req->getParsedBody()["district"],
                $req->getParsedBody()["city"]
            );


            $create = new CreateAccount();
            $response = $create->execute(
                (empty($req->getParsedBody()["photo"]) ? "empty.png" : $req->getParsedBody()["photo"]),
                $req->getParsedBody()["password"],
                $provider
            );

            if ($response) {
                header("Location: create-account?status=200");

                exit();
            } else {
                header("Location: create-account?status=400");

                exit();
            }
        } catch (\Exception $th) {
            if ($th->getCode() == 23000) {
                header("Location: create-account?status=23000");
                exit();
            }
        }
    }
}
