<?php

require_once "vendor/autoload.php";
require_once "src/helpers/functions.php";


use Slim\App;

$app = new App([
    'debug' => true
]);


// Routes
require_once "src/routes/client/route.php";
require_once "src/routes/admin/route.php";


$app->run();
