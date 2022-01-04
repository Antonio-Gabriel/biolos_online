<?php

use Vendor\controllers\admin\AuthController;
use Vendor\controllers\admin\RegisterController;
use Vendor\controllers\admin\ProviderAdminController;

$app->get('/login-admin', [new AuthController, 'handle']);
$app->get('/create-account', [new RegisterController, 'handle']);


$app->get('/provider-admin', [new ProviderAdminController, 'handle']);
