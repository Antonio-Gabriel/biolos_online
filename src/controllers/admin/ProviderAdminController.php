<?php

namespace Vendor\controllers\admin;

use Vendor\config\RainTpl;

use Vendor\config\Upload;
use Vendor\models\Provider;

use Vendor\validators\Password;
use Vendor\validators\Middleware;

use Vendor\usecases\admin\GetPaginate;
use Vendor\usecases\admin\GetProducts;
use Vendor\usecases\admin\DeleteProduct;
use Vendor\usecases\admin\UpdateAccount;
use Vendor\usecases\admin\AlterStateById;
use Vendor\usecases\admin\GetProviderData;
use Vendor\usecases\admin\GetCurrentProvider;
use Vendor\usecases\admin\GetPaginateBySearch;
use Vendor\usecases\admin\GetCategoryByProvider;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProviderAdminController
{

    public function handle(ServerRequestInterface $req)
    {

        Middleware::isProviderAuthenticated();

        $status = $req->getQueryParams()["status"] ?? 0;
        $template = new RainTpl("views/admin/");

        $search_input = @$req->getQueryParams()["search"];
        $page = @$req->getQueryParams()["page"];
        $category = @$req->getQueryParams()["category"];

        $search = isset($search_input) ? $search_input : "";
        $currentPage = isset($page) ? (int)$page : 1;

        if ($search !== "") {
            $paginateBySearch = new GetPaginateBySearch();
            $pagination = $paginateBySearch->execute(
                $search,
                intval($_SESSION["provider"][0]["id"]),
                $category,
                $currentPage
            );
        } else {
            $paginate = new GetPaginate();
            $pagination = $paginate->execute(
                $currentPage,
                intval($_SESSION["provider"][0]["id"])
            );
        }

        $pages = [];
        for ($i = 0; $i < $pagination['pages']; $i++) {
            array_push($pages, [
                'href' => '/bioloOnline/provider-admin?' . http_build_query([
                    'page' => $i + 1,
                    'search' => $search,
                    'category' => $category
                ]),
                'text' => $i + 1
            ]);
        }

        $currentProvider = new GetCurrentProvider();
        $provider = $currentProvider->execute(intval($_SESSION["provider"][0]["id"]));

        $categoryByProvider = new GetCategoryByProvider();
        $categories = $categoryByProvider->execute(intval($_SESSION["provider"][0]["id"]));

        $products = new GetProducts();
        $productList = $products->execute(intval($_SESSION["provider"][0]["id"]));

        return  $template->setTpl("provider-admin", [
            "provider" => $provider,
            "status_code" => intval($status),
            "categories" => $categories,
            "products" => $pagination['data'],
            "search" => $search,
            "pages" => $pages,
            "totalProduct" => count($productList)
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

    public function alterState(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        $alterState = new AlterStateById();

        $state = (intval($args["state"]) === 0) ? 1 : 0;

        $response = $alterState->execute(intval($args["id"]), $state);

        if ($response) {
            header("Location: /bioloOnline/provider-admin?status=203");
            exit();
        }

        header("Location: /bioloOnline/provider-admin?status=402");
        exit();
    }

    public function delete(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        $deleteProduct = new DeleteProduct();
        $response = $deleteProduct->execute(intval($args["id"]));

        if ($response) {
            header("Location: /bioloOnline/provider-admin?status=201");
            exit();
        }

        header("Location: /bioloOnline/provider-admin?status=402");
        exit();
    }
}
