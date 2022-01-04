<?php

namespace Vendor\models;

class Client
{

    public int $id;
    public int $contact;
    public string $name;
    public string $email;

    public function isNullOrEmpty()
    {
        if (!$this->name || !$this->email || !$this->contact) {
            return false;

            die;
        }

        return true;
    }
}
