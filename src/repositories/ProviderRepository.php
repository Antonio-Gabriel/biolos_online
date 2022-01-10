<?php

namespace Vendor\repositories;

use Vendor\config\db\Sql;

use Vendor\interfaces\IProviderRepository;

class ProviderRepository implements IProviderRepository
{
    private Sql $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function get(int $page = 1, int $itemsPerPage = 15)
    {
        $start = ($page - 1) * $itemsPerPage;

        $result = $this->sql->select(
            "SELECT SQL_CALC_FOUND_ROWS
             f.id, f.nome, c.foto
             FROM fornecedor f LEFT JOIN 
             conta c ON f.id = c.fornecedor_id
             ORDER BY f.nome
             LIMIT $start, $itemsPerPage;"
        );

        $totalItems = $this->sql->select("SELECT FOUND_ROWS() AS nrtotal;");        

        return [
            'data' => $result,
            'total' => (int)$totalItems[0]['nrtotal'],
            'pages' => ceil($totalItems[0]['nrtotal'] / $itemsPerPage)
        ];
    }

    public function getBySearch(string $search, int $page = 1, int $itemsPerPage = 15)
    {
        $start = ($page - 1) * $itemsPerPage;

        $search = "%$search%";

        $result = $this->sql->select(
            "SELECT SQL_CALC_FOUND_ROWS
             f.id, f.nome, c.foto
             FROM fornecedor f LEFT JOIN 
             conta c ON f.id = c.fornecedor_id
             WHERE f.nome LIKE :search
             ORDER BY f.nome
             LIMIT $start, $itemsPerPage;",
            [
                ":search" => $search
            ]
        );

        $totalItems = $this->sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            'data' => $result,
            'total' => (int)$totalItems[0]['nrtotal'],
            'pages' => ceil($totalItems[0]['nrtotal'] / $itemsPerPage)
        ];
    }
}
