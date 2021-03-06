<?php

namespace Vendor\repositories;

use Vendor\config\db\Sql;
use Vendor\models\Purchase;

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
        if ($authenticatedUser["client"] !== 0) {
            return $this->sql->select(
                "SELECT 
                 c.id, p.nome, p.preco, p.foto,
                 c.total, c.quantidade
                 FROM compra c LEFT JOIN produto p 
                 ON c.produto_id = p.id WHERE c.cliente_id = :id;",
                [
                    ":id" => $authenticatedUser["client"]
                ]
            );
        } else {
            return $this->sql->select(
                "SELECT 
                 c.id, p.nome, p.preco, p.foto,
                 c.total, c.quantidade
                 FROM compra c LEFT JOIN produto p 
                 ON c.produto_id = p.id WHERE c.fornecedor_id = :id;",
                [
                    ":id" => $authenticatedUser["provider"]
                ]
            );
        }
    }

    public function removeProductIntoCart(int $product_id)
    {
        return $this->sql->query(
            "DELETE FROM compra WHERE id = :id;
            ",
            [
                ":id" => $product_id
            ]
        );
    }

    public function updateQuantityOfProductFromCart(int $quantity, int $product_id)
    {
        $total = $this->sql->select(
            "SELECT p.preco FROM compra c LEFT JOIN produto p 
             ON c.produto_id = p.id WHERE c.id = :id;",
            [
                ":id" => $product_id
            ]
        );

        $numberFormat = str_replace(".", "", $total[0]["preco"]);
        $remoteLastValues = substr($numberFormat, 0, strlen($numberFormat) - 3);

        return $this->sql->query(
            "UPDATE compra SET quantidade = :quantidade, total = :total WHERE id = :id;
            ",
            [
                ":id" => $product_id,
                ":quantidade" => $quantity,
                ":total" => formatNumber(((int)$remoteLastValues * $quantity))
            ]
        );
    }

    public function removeProductFromCart(array $authenticatedUser = [])
    {
        if ($authenticatedUser["client"] !== 0) {
            return $this->sql->query(
                "DELETE FROM compra WHERE cliente_id = :id;
                ",
                [
                    ":id" => $authenticatedUser["client"]
                ]
            );
        } else {
            return $this->sql->query(
                "DELETE FROM compra WHERE fornecedor_id = :id;
                ",
                [
                    ":id" => $authenticatedUser["provider"]
                ]
            );
        }
    }

    public function sendEmailToClient(array $authenticatedUser = [])
    {
        if ($authenticatedUser["client"] !== 0) {
            return $this->sql->select(
                "SELECT
                 c.id, cl.nome as cliente, f.nome as fornecedor,
                 cl.email as cliente_email, f.email as fornecedor_email,
                 c.data_compra, p.nome as produto, p.preco, c.quantidade, c.total, 
                 cl.contacto cliente_contacto, f.contacto as fornecedor_contacto
                 FROM compra c 
                 LEFT JOIN produtofornecedor pf 
                 ON c.produto_id = pf.produto_id 
                 LEFT JOIN cliente cl ON c.cliente_id = cl.id
                 LEFT JOIN fornecedor f ON pf.fornecedor_id = f.id
                 LEFT JOIN produto p ON pf.produto_id = p.id
                 WHERE c.cliente_id = :id;
                ",
                [
                    ":id" => $authenticatedUser["client"]
                ]
            );
        } else {
            return $this->sql->select(
                "SELECT 
                 c.id, f.nome as fornecedor, fr.nome as fornecedor_venda, f.id as fornecedor_id,
                 f.email as fornecedor_email, fr.email as fornecedor_venda_email,
                 c.data_compra, p.nome as produto, p.preco, c.quantidade, c.total,
                 f.contacto as fornecedor_contacto, fr.contacto as fornecedor_venda_contacto
                 FROM compra c 
                 LEFT JOIN produtofornecedor pf ON c.produto_id = pf.produto_id                  
                 LEFT JOIN fornecedor f ON pf.fornecedor_id = f.id
                 LEFT JOIN fornecedor fr ON c.fornecedor_id = fr.id
                 LEFT JOIN produto p ON pf.produto_id = p.id
                 WHERE c.fornecedor_id = :id;
                ",
                [
                    ":id" => $authenticatedUser["provider"]
                ]
            );
        }
    }

    public function getProductsByPurchaseFromProvider(string $email, int $id)
    {
        return $this->sql->select(
            "SELECT
             c.id, cl.nome as cliente, f.nome as fornecedor,
             cl.email as cliente_email, f.email as fornecedor_email,
             c.data_compra, p.nome as produto, p.preco, c.quantidade, c.total, 
             cl.contacto cliente_contacto, f.contacto as fornecedor_contacto
             FROM compra c 
             LEFT JOIN produtofornecedor pf 
             ON c.produto_id = pf.produto_id 
             LEFT JOIN cliente cl ON c.cliente_id = cl.id
             LEFT JOIN fornecedor f ON pf.fornecedor_id = f.id
             LEFT JOIN produto p ON pf.produto_id = p.id
             WHERE f.email = :email AND c.cliente_id = :client;
            ",
            [
                ":email" => $email,
                ":client" => $id
            ]
        );
    }

    public function getProductsByPurchaseFromProviderLocal(string $email, int $id)
    {
        return $this->sql->select(
            "SELECT
             c.id, f.nome as fornecedor, fr.nome as fornecedor_venda, f.id as fornecedor_id,
             f.email as fornecedor_email, fr.email as fornecedor_venda_email,
             c.data_compra, p.nome as produto, p.preco, c.quantidade, c.total,
             f.contacto as fornecedor_contacto, fr.contacto as fornecedor_venda_contacto
             FROM compra c 
             LEFT JOIN produtofornecedor pf ON c.produto_id = pf.produto_id                  
             LEFT JOIN fornecedor f ON pf.fornecedor_id = f.id
             LEFT JOIN fornecedor fr ON c.fornecedor_id = fr.id
             LEFT JOIN produto p ON pf.produto_id = p.id 
             WHERE fr.email = :email AND c.fornecedor_id = :fornecedor;
            ",
            [
                ":email" => $email,
                ":fornecedor" => $id
            ]
        );
    }
}
