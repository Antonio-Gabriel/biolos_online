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
$app->post('/edit', [new ProviderAdminController, 'edit']);
$app->get('/edit-profile', [new ProviderAdminController, 'profile']);
$app->get('/provider-admin', [new ProviderAdminController, 'handle']);
$app->get('/product/{id}/state/{state}', [new ProviderAdminController, 'alterState']);
$app->get('/product/{id}/delete', [new ProviderAdminController, 'delete']);

// Product
$app->post('/add', [new ProductController, 'add']);
$app->get('/add-product', [new ProductController, 'handle']);
$app->post('/product-edit', [new ProductController, 'edit']);
$app->get('/product/{id}/edit', [new ProductController, 'show']);
