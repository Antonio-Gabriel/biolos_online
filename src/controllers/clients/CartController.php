<?php

namespace Vendor\controllers\clients;

use Vendor\config\RainTpl;
use Vendor\config\Mailer;

use Vendor\validators\Middleware;
use Vendor\usecases\AddProductIntoCart;

use Vendor\usecases\SendEmailToClient;
use Vendor\usecases\GetProductsFromCart;
use Vendor\usecases\RemoveProductFromCart;
use Vendor\usecases\RemoveProductsFromCart;
use Vendor\usecases\UpdateQuantityOfProductFromCart;
use Vendor\usecases\GetProductsByPurchaseFromProvider;
use Vendor\usecases\GetProductsByPurchaseFromProviderLocal;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CartController
{
    public function handle(ServerRequestInterface $req)
    {
        $status = $req->getQueryParams()["status"] ?? 0;
        $template = new RainTpl();

        $getProductsFromCart = new GetProductsFromCart();
        $products = $getProductsFromCart->execute(
            @intval($_SESSION["client"][0]["id"]) ?? 0,
            @intval($_SESSION["provider"][0]["id"]) ?? 0
        );

        $totalInStorage = [];
        foreach ($products as $product) {

            $numberFormat = (str_contains($product["total"], "."))
                ? str_replace(".", "", $product["total"])
                : $product["total"];

            $removeCommaFromPrice = (str_contains($numberFormat, ","))
                ? substr($numberFormat, 0, strlen($numberFormat) - 3)
                : $numberFormat;

            array_push($totalInStorage, (int)$removeCommaFromPrice);
        }

        $generalTotal = array_sum($totalInStorage);

        $this->updateCurrentQuantity($req->getQueryParams());

        return $template->setTpl("cart", [
            "provider" => @$_SESSION["provider"],
            "client" => @$_SESSION["client"],
            "status_code" => intval($status),
            "products" => $products,
            "total" => $generalTotal
        ]);
    }

    public function addToCart(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        Middleware::hasAuthenticated();

        try {

            $addProductIntoCart = new AddProductIntoCart();
            $response = $addProductIntoCart->execute(
                intval($args["product"]),
                intval(@$_SESSION["client"][0]["id"] ?? 0),
                intval(@$_SESSION["provider"][0]["id"] ?? 0)
            );

            if ($response) {

                header("Location: /bioloOnline/cart?status=200");
                exit();
            }

            header("Location: /bioloOnline/cart?status=400");
            exit();
        } catch (\Exception $th) {
            echo $th;
        }
    }

    public function removeProductToCart(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        try {

            $removeProductFromCart = new RemoveProductFromCart();
            $response = $removeProductFromCart->execute(intval($args["product"]));

            if ($response) {

                header("Location: /bioloOnline/cart?status=201");
                exit();
            }

            header("Location: /bioloOnline/cart?status=400");
            exit();
        } catch (\Exception $th) {
            echo $th;
        }
    }

    public function finishPurchase(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        // https://web.whatsapp.com/send?phone=+244942802448&text=Testando&source=&data=        

        Middleware::hasAuthenticated();

        $template = new RainTpl("views/email/");

        if (@$_SESSION["client"][0]["id"]) {

            $sendEmailToClient = new SendEmailToClient();
            $response = $sendEmailToClient->execute([
                "client" => intval($args["user_id"] ?? 0),
                "provider" => 0
            ]);

            $totalInStorage = [];
            foreach ($response as $product) {

                $numberFormat = (str_contains($product["total"], "."))
                    ? str_replace(".", "", $product["total"])
                    : $product["total"];

                $removeCommaFromPrice = (str_contains($numberFormat, ","))
                    ? substr($numberFormat, 0, strlen($numberFormat) - 3)
                    : $numberFormat;

                array_push($totalInStorage, (int)$removeCommaFromPrice);
            }

            $generalTotal = array_sum($totalInStorage);

            $providersList = [];
            foreach ($response as $value) {
                array_push($providersList, [
                    "fornecedor" => $value["fornecedor"],
                    "fornecedor_email" => $value["fornecedor_email"],
                    "fornecedor_contacto" => $value["fornecedor_contacto"]
                ]);
            }

            $mailer = new Mailer(
                $response[0]["cliente_email"],
                $response[0]["cliente"],
                'Produtos Agendados',
                'purchase-list',
                [
                    "provider" => array_unique($providersList, SORT_REGULAR),
                    "products" => $response,
                    "total" => $generalTotal
                ]
            );

            $state = $mailer->sendMail();

            if ($state) {

                foreach ($response as $value) {

                    $getProductsByPurchaseFromProvider = new GetProductsByPurchaseFromProvider();
                    $providerProducts = $getProductsByPurchaseFromProvider->execute($value["fornecedor_email"], intval($args["user_id"]));

                    $totalInStorageProvider = [];
                    foreach ($providerProducts as $product) {

                        $numberFormat = (str_contains($product["total"], "."))
                            ? str_replace(".", "", $product["total"])
                            : $product["total"];

                        $removeCommaFromPrice = (str_contains($numberFormat, ","))
                            ? substr($numberFormat, 0, strlen($numberFormat) - 3)
                            : $numberFormat;

                        array_push($totalInStorageProvider, (int)$removeCommaFromPrice);
                    }

                    $generalTotalProvider = array_sum(array_unique($totalInStorageProvider));
                    $mailer = new Mailer(
                        $value["fornecedor_email"],
                        $value["fornecedor"],
                        'Produtos Agendados',
                        'purchase-provider',
                        [
                            "provider" => $value["fornecedor"],
                            "client" => $value["cliente"],
                            "email" => $value["fornecedor_email"],
                            "contact" => $value["fornecedor_contacto"],
                            "products" => $providerProducts,
                            "total" => $generalTotalProvider
                        ]
                    );

                    $mailer->sendMail();
                }

                $removeProductsFromCart = new RemoveProductsFromCart();
                $removed = $removeProductsFromCart->execute([
                    "client" => intval($args["user_id"] ?? 0),
                    "provider" => 0
                ]);

                if ($removed) {
                    header("Location: /bioloOnline/cart?status=202");
                    exit();
                } else {
                    $removeProductsFromCart = new RemoveProductsFromCart();
                    $removeProductsFromCart->execute([
                        "client" => intval($args["user_id"] ?? 0),
                        "provider" => 0
                    ]);

                    header("Location: /bioloOnline/cart?status=202");
                    exit();
                }
            } else {
                header("Location: /bioloOnline/cart?status=400");
                exit();
            }
        } else {

            // Send Mail To Provider            

            $sendEmailToClient = new SendEmailToClient();
            $response = $sendEmailToClient->execute([
                "client" => 0,
                "provider" => intval($args["user_id"] ?? 0)
            ]);

            $totalInStorage = [];
            foreach ($response as $product) {

                $numberFormat = (str_contains($product["total"], "."))
                    ? str_replace(".", "", $product["total"])
                    : $product["total"];

                $removeCommaFromPrice = (str_contains($numberFormat, ","))
                    ? substr($numberFormat, 0, strlen($numberFormat) - 3)
                    : $numberFormat;

                array_push($totalInStorage, (int)$removeCommaFromPrice);
            }

            $generalTotal = array_sum($totalInStorage);

            $providersList = [];
            foreach ($response as $value) {
                array_push($providersList, [
                    "fornecedor" => $value["fornecedor"],
                    "fornecedor_email" => $value["fornecedor_email"],
                    "fornecedor_contacto" => $value["fornecedor_contacto"]
                ]);
            }

            $mailer = new Mailer(
                $response[0]["fornecedor_venda_email"],
                $response[0]["fornecedor_venda"],
                'Produtos Agendados',
                'purchase-provider-list',
                [
                    "provider" => array_unique($providersList, SORT_REGULAR),
                    "products" => $response,
                    "total" => $generalTotal
                ]
            );

            $state = $mailer->sendMail();

            if ($state) {

                foreach ($response as $value) {

                    $getProductsByPurchaseFromProvider = new GetProductsByPurchaseFromProviderLocal();
                    $providerProducts = $getProductsByPurchaseFromProvider->execute($value["fornecedor_venda_email"], intval($args["user_id"]));

                    $totalInStorageProvider = [];
                    foreach ($providerProducts as $product) {

                        $numberFormat = (str_contains($product["total"], "."))
                            ? str_replace(".", "", $product["total"])
                            : $product["total"];

                        $removeCommaFromPrice = (str_contains($numberFormat, ","))
                            ? substr($numberFormat, 0, strlen($numberFormat) - 3)
                            : $numberFormat;

                        array_push($totalInStorageProvider, (int)$removeCommaFromPrice);
                    }

                    $generalTotalProvider = array_sum(array_unique($totalInStorageProvider));

                    $mailer = new Mailer(
                        $value["fornecedor_email"],
                        $value["fornecedor"],
                        'Produtos Agendados',
                        'purchase-provider-admin',
                        [
                            "master_provider" => $value["fornecedor"],
                            "provider" => $value["fornecedor_venda"],
                            "email" => $value["fornecedor_email"],
                            "contact" => $value["fornecedor_contacto"],
                            "products" => $providerProducts,
                            "total" => $generalTotalProvider
                        ]
                    );

                    $mailer->sendMail();
                }

                $removeProductsFromCart = new RemoveProductsFromCart();
                $removed = $removeProductsFromCart->execute([
                    "client" => 0,
                    "provider" => intval($args["user_id"] ?? 0)
                ]);

                if ($removed) {
                    header("Location: /bioloOnline/cart?status=202");
                    exit();
                } else {
                    $removeProductsFromCart = new RemoveProductsFromCart();
                    $removeProductsFromCart->execute([
                        "client" => 0,
                        "provider" => intval($args["user_id"] ?? 0)
                    ]);

                    header("Location: /bioloOnline/cart?status=202");
                    exit();
                }
            } else {
                header("Location: /bioloOnline/cart?status=400");
                exit();
            }
        }
    }

    private function updateCurrentQuantity(array $args = [])
    {

        if (isset($args["ac"]) && isset($args["qtd"]) && isset($args["prd"])) {
            if ($args["ac"] === "add") {
                $newQtd = intval($args["qtd"]) + 1;
            }

            if ($args["ac"] === "rem") {
                if (intval($args["qtd"]) > 1) {
                    $newQtd = intval($args["qtd"]) - 1;
                } else {
                    $newQtd = 1;
                }
            }

            $updateQuantityOfProductFromCart = new UpdateQuantityOfProductFromCart();
            $response = $updateQuantityOfProductFromCart->execute($newQtd, intval($args["prd"]));

            if ($response) {
                header("Location: /bioloOnline/cart");
                exit();
            }
        }
    }
}
