<?php

namespace Vendor\models;

class Provider
{

    public int $id;
    public int $contact;
    public string $name;
    public string $email;
    public string $road;
    public string $district;
    public string $city;

    public function __construct($contact = 0, $name = "", $email = "", $road = "", $district = "", $city = "", $id = 0)
    {
        $this->id = $id;
        $this->contact = $contact;
        $this->name = $name;
        $this->email = $email;
        $this->road = $road;
        $this->district = $district;
        $this->city = $city;
    }

    public function isNullOrEmpty()
    {

        if (
            !$this->name
            || !$this->contact
            || !$this->email
            || !$this->road
            || !$this->district
            || !$this->city
        ) {
            return false;

            die;
        }

        return true;
    }
}
