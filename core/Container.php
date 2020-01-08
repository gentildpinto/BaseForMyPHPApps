<?php

namespace Core;

class Container {

    public static function newController($controller) {
        $objController = "App\\controllers\\" . $controller;
        return new $objController;
    }

    public static function pageNotFound() {
        if(file_exists(__DIR__."/../app/views/404.php")) {
            return require __DIR__."/../app/views/404.php";
        } else {
            echo "<h1>Error 404: Page Not Found</h1>";
        }
    }
}