<?php

use Vendor\controllers\admin\AuthController;
use Vendor\controllers\admin\RegisterController;
use Vendor\controllers\admin\ProviderAdminController;

// Auth and register
$app->get('/login-admin', [new AuthController, 'handle']);
$app->post('/login-admin', [new AuthController, 'auth']);

$app->get('/create-account', [new RegisterController, 'handle']);
$app->post('/admin-create', [new RegisterController, 'create']);


// Provider
$app->get('/provider-admin', [new ProviderAdminController, 'handle']);
