<?php

namespace Vendor\interfaces;

interface IAuthClientRepository
{
    public function login(string $username, string $email);
    public function logout();
}
