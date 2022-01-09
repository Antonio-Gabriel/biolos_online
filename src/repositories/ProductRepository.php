<?php

namespace Vendor\repositories;

use Vendor\config\db\Sql;
use Vendor\models\ProductProvider;

use Vendor\interfaces\IProductRepository;

class ProductRepository implements IProductRepository
{
    private Sql $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function create(ProductProvider $product)
    {
        if (!$product->product->isNullOrEmpty()) {
            throw new \Exception("Preencha devidamente os campos", 400);
        }

        $execute_query = $this->sql->query(
            "INSERT INTO produto (nome, preco, estado, descricao, foto, categoria_id) 
             VALUES (:nome, :preco, :estado, :descricao, :foto, :categoria_id);",
            [
                ":nome" => $product->product->name,
                ":preco" => $product->product->price,
                ":estado" => $product->product->state,
                ":descricao" => $product->product->description,
                ":foto" => $product->product->foto,
                ":categoria_id" => $product->product->category->id
            ]
        );

        $product->product->id = $this->sql->select("SELECT last_insert_id() as 'id';")[0]["id"];

        $execute_query_join = $this->sql->query(
            "INSERT INTO produtofornecedor (produto_id, fornecedor_id) 
             VALUES (:produto_id, :fornecedor_id);",
            [
                ":produto_id" => $product->product->id,
                ":fornecedor_id" => $product->provider->id
            ]
        );

        $stmt_response = [$execute_query, $execute_query_join];

        return $stmt_response;
    }

    public function update(ProductProvider $product)
    {
        $execute_query = $this->sql->query(
            "UPDATE produto SET nome = :nome, preco = :preco, estado = :estado,  
             descricao = :descricao, foto = :foto, categoria_id = :categoria_id
             WHERE id = :id;",
            [
                ":id" => $product->product->id,
                ":nome" => $product->product->name,
                ":preco" => $product->product->price,
                ":estado" => $product->product->state,
                ":descricao" => $product->product->description,
                ":foto" => $product->product->foto,
                ":categoria_id" => $product->product->category->id
            ]
        );

        return $execute_query;
    }

    public function alterStateById(int $product_id, int $state)
    {
        return $this->sql->query(
            "UPDATE produto SET estado = :estado
             WHERE id = :id;",
            [
                ":id" => $product_id,
                ":estado" => $state
            ]
        );
    }

    public function delete(int $produto_id)
    {
        return $this->sql->query(
            "DELETE FROM produto WHERE id = :id;",
            [
                ":id" => $produto_id
            ]
        );
    }

    public function get(int $provider_id)
    {
        return $this->sql->select(
            "SELECT pf.produto_id, pf.fornecedor_id, p.nome, 
             p.preco, p.descricao, p.foto, p.estado

             FROM produtofornecedor pf
             LEFT JOIN produto p ON pf.produto_id = p.id
             LEFT JOIN categoria c ON p.categoria_id = c.id
             WHERE pf.fornecedor_id = :provider;",
            [
                ":provider" => $provider_id
            ]
        );
    }

    public function getbyId(int $produto_id)
    {
        return $this->sql->select(
            "SELECT pf.produto_id, pf.fornecedor_id, p.nome, 
             p.preco, p.descricao, p.foto, p.estado

             FROM produtofornecedor pf
             LEFT JOIN produto p ON pf.produto_id = p.id
             LEFT JOIN categoria c ON p.categoria_id = c.id
             WHERE pf.produto_id = :produto_id;",
            [
                ":produto_id" => $produto_id
            ]
        );
    }

    public function getByCategory(int $provider_id)
    {
        return $this->sql->select(
            "SELECT DISTINCT c.id, c.nome FROM produtofornecedor pf
             LEFT JOIN produto p ON pf.produto_id = p.id
             LEFT JOIN categoria c ON p.categoria_id = c.id
             WHERE pf.fornecedor_id = :provider;",
            [
                ":provider" => $provider_id
            ]
        );
    }

    public function getProductDetailsByProvider(int $product_id, int $provider_id)
    {
        return $this->sql->select(
            "SELECT  
             p.id, p.nome as produto, p.preco, p.descricao, p.foto,
             c.nome as categoria, f.nome as fornecedor,
             f.contacto, f.email, f.rua, f.bairro, f.cidade, f.id as fornecedor_id,
             ct.foto as foto_fornecedor
            
             FROM produtofornecedor pf LEFT JOIN produto p ON 
             pf.produto_id = p.id LEFT JOIN categoria c ON
             p.categoria_id = c.id LEFT JOIN fornecedor f ON
             pf.fornecedor_id = f.id LEFT JOIN conta ct ON
             f.id = ct.id WHERE pf.fornecedor_id = :provider and p.id = :product;",
            [
                ":provider" => $provider_id,
                ":product" => $product_id
            ]
        );
    }

    public function verifyExistentProduct(string $name, int $category_id, int $provider)
    {
        return $this->sql->select(
            "SELECT *FROM produtofornecedor pf LEFT JOIN produto p 
             ON pf.produto_id = p.id LEFT JOIN fornecedor f 
             ON pf.fornecedor_id = f.id
             WHERE p.nome = :name and p.categoria_id = :category_id and f.id = :provider;",
            [
                ":name" => $name,
                ":category_id" => $category_id,
                ":provider" => $provider
            ]
        );
    }
}
