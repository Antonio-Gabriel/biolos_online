<?php

namespace Vendor\interfaces;

interface IClientAuth
{
    public function authenticated(string $username, string $email);
    public function logout();
}
