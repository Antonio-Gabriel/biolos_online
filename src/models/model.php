<?php

namespace Vendor\models;

class Model
{
    private $values;

    public function __call($name, $arguments)
    {
        $method = substr($name, 0, 3);
        $fieldName = substr($name, 3, strlen($name));

        switch ($method) {
            case 'get':
                return (isset($this->values[$fieldName]) ? $this->values[$fieldName] : null);
                break;
            case 'set':
                return $this->values[$fieldName] = $arguments[0];
                break;
        }
        exit;
    }

    public function setData($data = [])
    {
        foreach ($data as $key => $value) {
            $this->{"set" . $key}($value);
        }
    }

    public function getValues()
    {
        return $this->values;
    }
}