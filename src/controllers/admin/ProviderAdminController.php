<?php

namespace Vendor\controllers\admin;

use Vendor\config\RainTpl;

use Vendor\config\Upload;
use Vendor\models\Provider;

use Vendor\validators\Password;
use Vendor\validators\Middleware;

use Vendor\usecases\admin\UpdateAccount;
use Vendor\usecases\admin\GetProviderData;
use Vendor\usecases\admin\GetCurrentProvider;

use Psr\Http\Message\ServerRequestInterface;

class ProviderAdminController
{

    public function handle(ServerRequestInterface $req)
    {
        Middleware::isProviderAuthenticated();

        $status = $req->getQueryParams()["status"] ?? 0;
        $template = new RainTpl("views/admin/");

        $currentProvider = new GetCurrentProvider();
        $provider = $currentProvider->execute(intval($_SESSION["provider"][0]["id"]));

        return  $template->setTpl("provider-admin", [
            "provider" => $provider,
            "status_code" => intval($status)
        ]);
    }

    public function profile(ServerRequestInterface $req)
    {
        Middleware::isProviderAuthenticated();

        $status = $req->getQueryParams()["status"] ?? 0;
        $template = new RainTpl("views/admin/");

        $currentProvider = new GetCurrentProvider();
        $provider = $currentProvider->execute(intval($_SESSION["provider"][0]["id"]));

        return  $template->setTpl("edit-profile", [
            "provider" => $provider,
            "status_code" => intval($status)
        ]);
    }

    public function edit(ServerRequestInterface $req)
    {
        try {

            $provider = new Provider(
                $req->getParsedBody()["contact"],
                $req->getParsedBody()["name"],
                $req->getParsedBody()["email"],
                $req->getParsedBody()["state"],
                $req->getParsedBody()["district"],
                $req->getParsedBody()["city"],
                $req->getParsedBody()["id"]
            );

            if (
                (!Password::checkPass($req->getParsedBody()["password"]) &&
                    !empty($req->getParsedBody()["password"])) ||
                (!Password::checkPass($req->getParsedBody()["newPassword"]) &&
                    !empty($req->getParsedBody()["newPassword"]))
            ) {

                header("Location: edit-profile?status=403");

                exit();
            } else if ($req->getParsedBody()["password"] && !$req->getParsedBody()["newPassword"]) {

                header("Location: edit-profile?status=10");

                exit();
            } else if (!$req->getParsedBody()["password"] && $req->getParsedBody()["newPassword"]) {
                header("Location: edit-profile?status=11");

                exit();
            }

            $getProviderData = new GetProviderData();
            $provierData = $getProviderData->execute($req->getParsedBody()["id"]);

            if (
                !Password::comparePassword(
                    $req->getParsedBody()["password"],
                    $provierData[0]["password"]
                ) && $req->getParsedBody()["password"]
            ) {

                header("Location: edit-profile?status=400");
                exit();
            }

            $upload = new Upload();
            $update = new UpdateAccount();

            $response = $update->execute(
                ($upload->UploadPhoto() == "empty.png" ? $req->getParsedBody()["photo"] : $upload->UploadPhoto()),
                $req->getParsedBody()["newPassword"],
                $provider
            );

            if ($response) {
                session_start();
                session_regenerate_id();

                header("Location: provider-admin?status=200");

                exit();
            } else {
                header("Location: edit-profile?status=402");

                exit();
            }
        } catch (\Exception $th) {
            if ($th->getCode() === 14) {
                header("Location: edit-profile?status=14");

                exit();
            }

            if ($th->getCode() === 15) {
                header("Location: edit-profile?status=15");

                exit();
            }

            header("Location: edit-profile?status=500");

            exit();
        }
    }
}
