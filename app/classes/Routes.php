<?php

namespace app\classes;

use Exception;

class Routes {
    public static function load($routes, $uri) {
        if(!array_key_exists($uri, $routes))
            throw new Exception("Route not found {$uri}");
        #$aux = explode("@", $routes[$uri]);
        #$class = 'app\controllers\\'.$aux[0];
        #$object = new $class();
        #$object->{$aux[1]}();
        return "../app/{$routes[$uri]}.php";
    }
}