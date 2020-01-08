<?php

use Core\Route;

$routes = require __DIR__."/../app/routes.php";
$route  = new Route($routes);

App\classes\Bind::bind('connection', App\models\Connection::connect());