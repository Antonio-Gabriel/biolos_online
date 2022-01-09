<?php

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "./vendor/autoload.php";
require_once "src/helpers/Functions.php";

use Slim\App;

$app = new App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

// Routes
require_once "src/routes/admin/Route.php";
require_once "src/routes/client/Route.php";


$app->run();
