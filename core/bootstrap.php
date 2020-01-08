<?php

use Core\Route;

$routes = require __DIR__."/../app/routes.php";
$route  = new Route($routes);

Core\Bind::bind('connection', Core\Connection::connect());