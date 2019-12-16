<?php

use app\classes\Layout;
use app\classes\Routes;
use app\classes\Uri;

require "../bootstrap.php";

$routes = [
    '/' => 'controllers/homeController'
];

$uri = Uri::load();
$layout = new Layout;

require Routes::load($routes, $uri);
require $layout->masterLayout('main');