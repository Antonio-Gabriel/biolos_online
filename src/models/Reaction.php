<?php

namespace Vendor\models;


class Reaction
{
    public int $id;
    public int $reacao;
    public Client $cliend;
    public Provider $provider;
    public Product $product;

    public function isNullOrEmpaty()
    {
        if (
            !$this->client
            || $this->provider
            || $this->product
            || $this->reacao
        ) {
            return false;

            die;
        }

        return true;
    }
}
