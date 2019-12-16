<?php

namespace app\classes;

use Exception;

class Routes {
    public static function load($routes, $url) {
        if(!array_key_exists($url, $routes))
            throw new Exception("Route not found {$url}");
        return "../app/{$routes[$url]}.php";
    }
}