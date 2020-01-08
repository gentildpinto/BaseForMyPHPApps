<?php

namespace Core;

use stdClass;

class Route {
    private $routes;

    public function __construct(array $routes) {
        $this->setRoutes($routes);
        $this->run();
    }

    private function setRoutes($routes) {
        foreach($routes as $route) {
            $explode  = explode('@', $route[1]);
            $array    = [$route[0], $explode[0], $explode[1]];
            $newRoute = $array;
        }
        $this->routes = $newRoute;
    }

    private function getRequest() {
        $obj = new stdClass;

        foreach($_GET as $key => $value) {
            $obj->$key = $value;
        }

        foreach($_POST as $key => $value) {
            $obj->$key = $value;
        }

        return $obj;
    }

    private function getUrl() {
        return parse_url($_SERVER['REQUEST_URI'], 5);
    }

    private function run() {
        $url      = $this->getUrl();
        $urlArray = explode('/', $url);

        foreach($this->routes as $route) {
            $routeArray = explode('/', $route[0]);

            for($i = 0; $i < count($routeArray); $i++) {
                if((count($routeArray) == count($urlArray)) && (strpos($routeArray[$i], "{") !== false)) {
                    $routeArray[$i] = $urlArray[$i];
                    $param[]        = $urlArray[$i];
                }
                $route[0] = implode('/', $routeArray);
            }

            if($url == $route[0]) {
                $found      = true;
                $controller = $route[1];
                $action     = $route[2];
                break;
            }
        }

        if($found) {
            $controller = Container::newController($controller);
            switch(count($param)) {
                case 1:
                    $controller->$action($param[0], $this->getRequest());
                    break;
                case 2:
                    $controller->$action($param[0], $param[1],$this->getRequest());
                    break;
                case 3:
                    $controller->$action($param[0], $param[1], $param[2], $this->getRequest());
                    break;
                default:
                $controller->$action($this->getRequest());
            }
        } else {
            Container::pageNotFound();
        }
    }
}