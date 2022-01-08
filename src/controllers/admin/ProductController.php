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
use Vendor\usecases\admin\GetCurrentProvider;

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

    public function add(ServerRequestInterface $req)
    {
        try {
            //code...                           

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
}
