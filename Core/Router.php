<?php
namespace Core;

class Router {

    private static $routes;

    public static function connect($url, $routes){

        self::$routes[$url] = $routes;

    }

    public static function get($url){

        return self::$routes[$url];

    }

}

?>