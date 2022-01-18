<?php

namespace Vendor\controllers\admin;


use Vendor\config\RainTpl;
use Vendor\config\Upload;

use Vendor\models\Product;
use Vendor\models\Provider;
use Vendor\models\Category;

use Vendor\validators\Middleware;

use Vendor\usecases\GetCategories;
use Vendor\usecases\admin\CreateProduct;
use Vendor\usecases\admin\UpdateProduct;
use Vendor\usecases\admin\GetProductById;
use Vendor\usecases\admin\GetCurrentProvider;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductController
{

    public function handle(ServerRequestInterface $req)
    {
        Middleware::isProviderAuthenticated();

        $status = $req->getQueryParams()["status"] ?? 0;
        $template = new RainTpl("views/admin/");

        $currentProvider = new GetCurrentProvider();
        $provider = $currentProvider->execute(intval($_SESSION["provider"][0]["id"]));

        $categories = new GetCategories();
        $categoryData = $categories->execute();

        return  $template->setTpl("add-product", [
            "provider" => $provider,
            "categories" => $categoryData,
            "status_code" => intval($status)
        ]);
    }


    public function show(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        Middleware::isProviderAuthenticated();

        $status = $req->getQueryParams()["status"] ?? 0;
        $template = new RainTpl("views/admin/");

        $currentProvider = new GetCurrentProvider();
        $provider = $currentProvider->execute(intval($_SESSION["provider"][0]["id"]));

        $categories = new GetCategories();
        $categoryData = $categories->execute();

        $currentProduct = new GetProductById();
        $product = $currentProduct->execute(intval($args["id"]));

        return  $template->setTpl("edit-product", [
            "provider" => $provider,
            "status_code" => intval($status),
            "categories" => $categoryData,
            "product" => $product
        ]);
    }


    public function add(ServerRequestInterface $req)
    {
        try {

            $state = (
                (@$req->getParsedBody()["state"] === "on" &&
                    @$req->getParsedBody()["state"] !== null) ? 1 : 0);


            if (!floatval($req->getParsedBody()["price"])) {

                header("Location: add-product?status=12");
                exit();
            }


            if ($_FILES["photo"]["name"]) {

                $upload = new Upload();

                $product = new Product(
                    $state,
                    floatval(formatNumber($req->getParsedBody()["price"])),
                    $req->getParsedBody()["name"],
                    $upload->UploadPhoto(),
                    $req->getParsedBody()["description"],
                    new Category($req->getParsedBody()["category"])
                );

                $provider = new Provider();
                $provider->id = $_SESSION["provider"][0]["id"];

                $createProduct = new CreateProduct();
                $response = $createProduct->execute($product, $provider);

                if ($response) {
                    header("Location: add-product?status=200");

                    exit();
                } else {
                    header("Location: add-product?status=400");

                    exit();
                }
            } else {
                header("Location: add-product?status=403");
                exit();
            }
        } catch (\Exception $th) {

            echo $th;

            if ($th->getCode() == 23000) {
                header("Location: add-product?status=23000");
                exit();
            }
        }
    }

    public function edit(ServerRequestInterface $req)
    {
        try {

            $state = (
                (@$req->getParsedBody()["state"] === "on" &&
                    @$req->getParsedBody()["state"] !== null) ? 1 : 0);


            if (!floatval($req->getParsedBody()["price"])) {

                $id = intval($req->getParsedBody()["id"]);
                header("Location: product/{$id}/edit?status=12");

                exit();
            }

            $upload = new Upload();

            $numberFormat = str_replace(".", "", $req->getParsedBody()["price"]);

            $product = new Product(
                $state,
                formatNumber(substr($numberFormat, 0, strlen($numberFormat) - 3)),
                $req->getParsedBody()["name"],
                (empty($_FILES["photo"]["name"]) ? $req->getParsedBody()["photo"] : $upload->UploadPhoto()),
                $req->getParsedBody()["description"],
                new Category($req->getParsedBody()["category"]),
                intval($req->getParsedBody()["id"])
            );

            $provider = new Provider();
            $provider->id = $_SESSION["provider"][0]["id"];

            $updateProduct = new UpdateProduct();
            $response = $updateProduct->execute($product, $provider);

            if ($response) {
                header("Location: provider-admin?status=202");

                exit();
            } else {
                $id = intval($req->getParsedBody()["id"]);
                header("Location: product/{$id}/edit?status=400");

                exit();
            }
        } catch (\Exception $th) {

            echo $th;
        }
    }
}
