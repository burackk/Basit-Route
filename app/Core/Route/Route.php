<?php

namespace Core\Route;

class Route {
    private BaseRoute $baseRoute;
    private static array $route = [];
    public  function createInstance(BaseRoute $baseRoute) {
        $this->baseRoute = $baseRoute;
    }

    public static function createRoute(Route $route) {
        self::$route["route"] = $route;
    }

    private function addToBaseRoute($route, $class) {
        $this->baseRoute->addToRoute($route, $class);
    }


    public static function get($route, $class) {

        $newApp = self::$route["route"];

        $newApp->addToBaseRoute($route, $class);
    }
}