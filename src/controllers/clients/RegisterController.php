<?php

namespace Vendor\controllers\clients;

use Vendor\models\Model;
use Vendor\config\RainTpl;
use Vendor\usecases\CreateClient;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use function PHPSTORM_META\type;

class RegisterController extends Model
{

    public function __construct()
    {
        $this->setData($_POST);
    }

    public function handle(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {

        $status = $req->getQueryParams()["status"] ?? 0;
        $template = new RainTpl();

        return $template->setTpl("register", [
            "status_code" => intval($status)
        ]);
    }

    public function create(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {

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
}
