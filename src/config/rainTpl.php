<?php

namespace Vendor\config;

use Rain\Tpl;

class RainTpl
{
    private $tpl_dir;
    private $cache_dir;

    private $tpl;


    public function __construct($views = "views/")
    {
        $this->tpl_dir = $this->getPathLocation($views)["tpl"];
        $this->cache_dir = $this->getPathLocation($views)["cache"];

        $config = [
            "tpl_dir" => $this->tpl_dir,
            "cache_dir" => $this->cache_dir
        ];

        Tpl::configure($config);

        $this->tpl = new Tpl;
    }

    public function draw($view)
    {
        return $this->tpl->draw($view);
    }

    public function setTpl($view, $data = [])
    {
        $this->tpl->assign($data);
        return $this->draw($view);
    }

    private function getPathLocation($views)
    {
        return [
            "tpl" => dirname(__DIR__) . DIRECTORY_SEPARATOR . $views,
            "cache" => dirname(__DIR__) . DIRECTORY_SEPARATOR . $views . "cache/"
        ];
    }
}
