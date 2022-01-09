<?php

use Vendor\controllers\admin\AuthController;
use Vendor\controllers\admin\ProductController;
use Vendor\controllers\admin\RegisterController;
use Vendor\controllers\admin\ProviderAdminController;

// Auth and register
$app->get('/login-admin', [new AuthController, 'handle']);
$app->post('/login-admin', [new AuthController, 'auth']);

$app->get('/logout-admin', [new AuthController, 'logout']);

$app->get('/create-account', [new RegisterController, 'handle']);
$app->post('/admin-create', [new RegisterController, 'create']);

// Provider
$app->get('/provider-admin', [new ProviderAdminController, 'handle']);
$app->get('/edit-profile', [new ProviderAdminController, 'profile']);
$app->post('/edit', [new ProviderAdminController, 'edit']);

// Product
$app->get('/add-product', [new ProductController, 'handle']);
$app->get('/product/{id}/edit', [new ProductController, 'show']);
$app->post('/add', [new ProductController, 'add']);
$app->post('/product-edit', [new ProductController, 'edit']);
