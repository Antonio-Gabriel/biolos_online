<?php

namespace Vendor\controllers\clients;

use Vendor\config\RainTpl;

use Vendor\usecases\admin\GetPaginate;
use Vendor\usecases\admin\GetCurrentProvider;
use Vendor\usecases\admin\GetPaginateBySearch;
use Vendor\usecases\admin\GetCategoryByProvider;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProfileProviderController
{
    public function handle(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {

        $template = new RainTpl();

        $search_input = @$req->getQueryParams()["search"];
        $page = @$req->getQueryParams()["page"];
        $category = @$req->getQueryParams()["category"];

        $search = isset($search_input) ? $search_input : "";
        $currentPage = isset($page) ? (int)$page : 1;

        $currentProvider = new GetCurrentProvider();
        $provider = $currentProvider->execute(intval($args["id"]));

        if ($search !== "") {
            $paginateBySearch = new GetPaginateBySearch();
            $pagination = $paginateBySearch->execute(
                $search,
                intval($provider[0]["id"]),
                $category,
                $currentPage
            );
        } else {
            $paginate = new GetPaginate();
            $pagination = $paginate->execute(
                $currentPage,
                intval($provider[0]["id"])
            );
        }

        $pages = [];
        for ($i = 0; $i < $pagination['pages']; $i++) {
            array_push($pages, [
                'href' => "/bioloOnline/profile-provider/{$args["id"]}?" . http_build_query([
                    'page' => $i + 1,
                    'search' => $search,
                    'category' => $category
                ]),
                'text' => $i + 1
            ]);
        }

        $categoryByProvider = new GetCategoryByProvider();
        $categories = $categoryByProvider->execute(intval($args["id"]));

        $productFilter = GetTotalProductsByProvider(intval($provider[0]["id"]));        

        return $template->setTpl("profile-provider", [
            "provider" => @$_SESSION["provider"],
            "profile" => $provider,
            "products" => $pagination["data"],
            "productFilter" => $productFilter,
            "categories" => $categories,
            "search" => $search,
            "pages" => $pages
        ]);
    }    
}
