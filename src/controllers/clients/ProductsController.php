<?php

namespace Vendor\controllers\clients;

use Vendor\config\RainTpl;

use Vendor\usecases\GetCategories;
use Vendor\usecases\GetGlobalProducts;
use Vendor\usecases\GetGlobalProductsBySearch;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductsController
{
    public function handle(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        $template = new RainTpl();

        $search_input = @$req->getQueryParams()["search"];
        $page = @$req->getQueryParams()["page"];
        $category = @$req->getQueryParams()["category"] ?? 0;

        $search = isset($search_input) ? $search_input : "";
        $currentPage = isset($page) ? (int)$page : 1;

        if ($search !== "") {
            $paginateBySearch = new GetGlobalProductsBySearch();
            $pagination = $paginateBySearch->execute($search, $category, $currentPage);
        } else {
            $paginate = new GetGlobalProducts();
            $pagination = $paginate->execute($currentPage);
        }

        $pages = [];
        for ($i = 0; $i < $pagination['pages']; $i++) {
            array_push($pages, [
                'href' => '/bioloOnline/products?' . http_build_query([
                    'page' => $i + 1,
                    'search' => $search,
                    'category' => $category
                ]),
                'text' => $i + 1
            ]);
        }

        $categories = new GetCategories();
        $categoryData = $categories->execute();        

        return $template->setTpl("products", [
            "provider" => @$_SESSION["provider"],
            "client" => @$_SESSION["client"],
            "categories" => $categoryData,
            "products" => $pagination['data'],
            "search" => $search,
            "pages" => $pages,
        ]);
    }
}
