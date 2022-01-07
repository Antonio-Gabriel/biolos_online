<?php

namespace Vendor\repositories;

use Vendor\interfaces\IAuthProviderRepository;

class AuthProvider implements IAuthProviderRepository {

    public function login(string $email, string $password) {}
    
    public function logout() {}

}