<?php

namespace Vendor\interfaces;

interface IAuthProviderRepository
{
    public function login(string $email, string $password);
    public function logout();
}
