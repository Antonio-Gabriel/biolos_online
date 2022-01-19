<?php

namespace Vendor\repositories;

use Vendor\config\db\Sql;

use Vendor\interfaces\IProductGlobalRepository;

class ProductGlobalRepository implements IProductGlobalRepository
{
    private Sql $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function getPaginate(int $page = 1, int $itemsPerPage = 15)
    {
        $start = ($page - 1) * $itemsPerPage;

        $result = $this->sql->select(
            "SELECT SQL_CALC_FOUND_ROWS
             p.id, p.nome as product_name,
             pf.fornecedor_id, p.foto,
             c.nome as categoria, p.descricao, p.preco 
             FROM produtofornecedor pf
             LEFT JOIN produto p ON pf.produto_id = p.id
             LEFT JOIN categoria c ON p.categoria_id = c.id
             WHERE p.estado != 0
             ORDER BY p.nome
             LIMIT $start, $itemsPerPage;",
            []
        );

        $totalItems = $this->sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            'data' => $result,
            'total' => (int)$totalItems[0]['nrtotal'],
            'pages' => ceil($totalItems[0]['nrtotal'] / $itemsPerPage)
        ];
    }

    public function getPaginateBySearch(
        string $search,
        int $category_id,
        int $page = 1,
        int $itemsPerPage = 15
    ) {
        $start = ($page - 1) * $itemsPerPage;

        $search = "%$search%";

        if ($category_id !== 0) {
            $result = $this->sql->select(
                "SELECT SQL_CALC_FOUND_ROWS 
                 p.id, p.nome as product_name,
                 pf.fornecedor_id, p.foto,
                 c.nome as categoria, p.descricao, p.preco 
                 FROM produtofornecedor pf
                 LEFT JOIN produto p ON pf.produto_id = p.id
                 LEFT JOIN categoria c ON p.categoria_id = c.id
                 WHERE p.estado != 0
                 AND p.nome LIKE :search AND c.id = :category_id
                 ORDER BY p.nome
                 LIMIT $start, $itemsPerPage;",
                [
                    ":search" => $search,
                    ":category_id" => $category_id
                ]
            );
        } else {
            $result = $this->sql->select(
                "SELECT SQL_CALC_FOUND_ROWS 
                 p.id, p.nome as product_name,
                 pf.fornecedor_id, p.foto,
                 c.nome as categoria, p.descricao, p.preco 
                 FROM produtofornecedor pf
                 LEFT JOIN produto p ON pf.produto_id = p.id
                 LEFT JOIN categoria c ON p.categoria_id = c.id
                 WHERE p.estado != 0
                 AND p.nome LIKE :search
                 ORDER BY p.nome
                 LIMIT $start, $itemsPerPage;",
                [
                    ":search" => $search,
                ]
            );
        }

        $totalItems = $this->sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            'data' => $result,
            'total' => (int)$totalItems[0]['nrtotal'],
            'pages' => ceil($totalItems[0]['nrtotal'] / $itemsPerPage)
        ];
    }
}
