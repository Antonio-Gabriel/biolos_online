<?php

namespace Vendor\controllers\clients;

use Vendor\config\RainTpl;

use Vendor\usecases\GetProviders;
use Vendor\usecases\GetProvidersBySearch;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProviderController
{
    public function handle(
        ServerRequestInterface $req,
        ResponseInterface $res,
        $args = []
    ) {
        $template = new RainTpl();

        $search_input = @$req->getQueryParams()["search"];
        $page = @$req->getQueryParams()["page"];

        $search = isset($search_input) ? $search_input : "";
        $currentPage = isset($page) ? (int)$page : 1;

        if ($search !== "") {
            $paginateBySearch = new GetProvidersBySearch();
            $pagination = $paginateBySearch->execute($search, $currentPage);
        } else {
            $defaultPage = new GetProviders();
            $pagination = $defaultPage->execute($currentPage);
        }

        $pages = [];
        for ($i = 0; $i < $pagination['pages']; $i++) {
            array_push($pages, [
                'href' => '/bioloOnline/providers?' . http_build_query([
                    'page' => $i + 1,
                    'search' => $search
                ]),
                'text' => $i + 1
            ]);
        }

        return $template->setTpl("provider", [
            "provider" => @$_SESSION["provider"],
            "providers" => $pagination["data"],
            "search" => $search,
            "pages" => $pages
        ]);
    }
}
