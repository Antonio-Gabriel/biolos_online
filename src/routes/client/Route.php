<?php

use Vendor\controllers\clients\AuthController;
use Vendor\controllers\clients\CartController;
use Vendor\controllers\clients\HomeController;
use Vendor\controllers\clients\ProviderController;
use Vendor\controllers\clients\RegisterController;
use Vendor\controllers\clients\ProductsController;
use Vendor\controllers\clients\ProductDetailController;
use Vendor\controllers\clients\ProfileProviderController;


// Default
$app->get('/', [new HomeController, 'handle']);
$app->get('/home', [new HomeController, 'handle']);

// Auth and register
$app->get('/login', [new AuthController, 'handle']);
$app->get('/create-client', [new RegisterController, 'handle']);

// Products
$app->get('/products', [new ProductsController, 'handle']);
$app->get('/product/{id}/details', [new ProductDetailController, 'handle']);

// Providers
$app->get('/profile-provider', [new ProfileProviderController, 'handle']);
$app->get('/providers', [new ProviderController, 'handle']);

// Cart routes
$app->get('/cart', [new CartController, 'handle']);
