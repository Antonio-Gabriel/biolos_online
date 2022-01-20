<?php

namespace Vendor\controllers\clients;

use Vendor\models\Model;
use Vendor\config\RainTpl;
use Psr\Http\Message\ResponseInterface;
use Vendor\usecases\client\CreateClient;
use Vendor\usecases\client\RemoveClient;
use Psr\Http\Message\ServerRequestInterface;

class RegisterController extends Model
{

    public function __construct()
    {
        $this->setData($_POST);
    }

    public function handle(ServerRequestInterface $req)
    {
        $status = $req->getQueryParams()["status"] ?? 0;
        $template = new RainTpl();

        return $template->setTpl("register", [
            "status_code" => intval($status),
            "client" => @$_SESSION["client"],
        ]);
    }

    public function create()
    {
        try {

            $create = new CreateClient();
            $response = $create->execute(
                $this->getname(),
                $this->getemail(),
                $this->getcontact()
            );

            if ($response) {
                header("Location: create-client?status=200");

                exit();
            } else {
                header("Location: create-client?status=400");

                exit();
            }
        } catch (\Exception $th) {
            if ($th->getCode() == 23000) {
                header("Location: create-client?status=23000");
                exit();
            }
        }
    }

    public function delete(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        try {

            $remove = new RemoveClient();
            $remove->execute(intval($args["id"]));
        } catch (\Exception $th) {
            //throw $th;
        }
    }
}
