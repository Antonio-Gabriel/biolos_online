<?php

namespace Vendor\models;

class Account
{
    public int $id;
    public string $foto;
    public string $password;
    public Provider $provider;

    public function is_nullOrEmpty()
    {
        if (
            !$this->foto
            || !$this->password
            || !$this->provider

        ) {
            return false;

            die;
        }
        return true;
    }
}
