<?php

namespace Vendor\repositories;

use Vendor\config\db\Sql;
use Vendor\models\Purchase;
use Vendor\models\ProductProvider;

use Vendor\interfaces\IPurchaseRepository;

class PurchaseRepository implements IPurchaseRepository
{
    private Sql $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function addProductIntoCart(Purchase $purchase)
    {
        if ($purchase->client->id !== 0) {

            $productInStorage = $this->sql->select(
                "SELECT *FROM compra
                 WHERE cliente_id = :cliente AND produto_id = :produto;",
                [
                    ":cliente" => $purchase->client->id,
                    ":produto" => $purchase->product->id,
                ]
            );

            if (!$productInStorage) {
                return $this->sql->query(
                    "INSERT INTO compra(cliente_id, fornecedor_id, produto_id, quantidade, total) 
                     VALUES (:cliente, :fornecedor, :produto, 1, 
                        (SELECT preco FROM produto WHERE id = :produto));
                    ",
                    [
                        ":cliente" => $purchase->client->id,
                        ":fornecedor" => null,
                        ":produto" => $purchase->product->id
                    ]
                );
            } else {
                $numberFormat = str_replace(".", "", $productInStorage[0]['total']);
                $remoteLastValues = substr($numberFormat, 0, strlen($numberFormat) - 3);
                $refreshQuantity = ($productInStorage[0]['quantidade'] + 1);

                return $this->sql->query(
                    "UPDATE compra SET quantidade = :quantidade, total = :total WHERE id = :id;
                    ",
                    [
                        ":id" => $productInStorage[0]['id'],
                        ":quantidade" => $refreshQuantity,
                        ":total" => formatNumber(((int)$remoteLastValues * (int)$refreshQuantity))
                    ]
                );
            }
        } else {

            $productInStorage = $this->sql->select(
                "SELECT *FROM compra
                 WHERE fornecedor_id = :fornecedor AND produto_id = :produto;",
                [
                    ":fornecedor" => $purchase->provider->id,
                    ":produto" => $purchase->product->id,
                ]
            );

            if (!$productInStorage) {
                return $this->sql->query(
                    "INSERT INTO compra(cliente_id, fornecedor_id, produto_id, quantidade, total) 
                     VALUES (:cliente, :fornecedor, :produto, 1, 
                       (SELECT preco FROM produto WHERE id = :produto));",
                    [
                        ":cliente" => null,
                        ":fornecedor" => $purchase->provider->id,
                        ":produto" => $purchase->product->id
                    ]
                );
            } else {
                $numberFormat = str_replace(".", "", $productInStorage[0]['total']);
                $remoteLastValues = substr($numberFormat, 0, strlen($numberFormat) - 3);
                $refreshQuantity = ($productInStorage[0]['quantidade'] + 1);

                return $this->sql->query(
                    "UPDATE compra SET quantidade = :quantidade, total = :total WHERE id = :id;
                    ",
                    [
                        ":id" => $productInStorage[0]['id'],
                        ":quantidade" => $refreshQuantity,
                        ":total" => formatNumber(((int)$remoteLastValues * (int)$refreshQuantity))
                    ]
                );
            }
        }
    }

    public function showProductIntoCart(array $authenticatedUser = [])
    {
        
    }

    public function removeProductIntoCart(int $product_id)
    {
    }

    public function updateQuantityOfProductIntoCart(Purchase $purchase)
    {
    }

    public function sendMessageToProvider(ProductProvider $productProvider)
    {
    }
}
