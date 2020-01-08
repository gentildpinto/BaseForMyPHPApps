<?php

use Core\Route;

require __DIR__."/../app/functions/helpers.php";

$routes = require __DIR__."/../app/routes.php";
$route  = new Route($routes);

Core\Bind::bind('connection', Core\Connection::connect());