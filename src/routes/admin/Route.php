<?php

use Vendor\controllers\admin\AuthController;
use Vendor\controllers\admin\RegisterController;
use Vendor\controllers\admin\ProviderAdminController;

// Auth and register
$app->get('/login-admin', [new AuthController, 'handle']);
$app->get('/create-account', [new RegisterController, 'handle']);


// Provider
$app->get('/provider-admin', [new ProviderAdminController, 'handle']);
