<?php

use Core\Route;

Core\Container::bind('connection', Core\Connection::connect());

require __DIR__."/../app/functions/helpers.php";

$routes = require __DIR__."/../config/routes.php";
$route  = new Route($routes);