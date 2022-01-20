<?php

namespace Vendor\usecases;

use Vendor\models\Client;
use Vendor\models\Product;
use Vendor\models\Provider;

use Vendor\models\Category;
use Vendor\models\Purchase;

use Vendor\repositories\PurchaseRepository;

class AddProductIntoCart
{
    public function execute(int $productId, int $clientId, int $providerId)
    {
        $purchase = new Purchase();
        $purchase->product = new Product(0, "", "", "", "", new Category(), $productId);

        $purchase->client = new Client();
        $purchase->client->id = $clientId;

        $purchase->provider = new Provider(0, "", "", "", "", "", $providerId);

        $purchaseRepository = new PurchaseRepository();

        $response = $purchaseRepository->addProductIntoCart($purchase);

        if ($response) {
            return true;

            die();
        }
    }
}
