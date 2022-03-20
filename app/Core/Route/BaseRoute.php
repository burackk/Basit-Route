<?php

namespace Core\Route;

class BaseRoute {
    private array $routes = [];
    public function addToRoute($route, $class) {
        if(!isset($routes[$route])) {
            $this->routes[$route] = [
                "class" => $class,
                "pattern" => $route
            ];
        }
    }

    public function runRoute() {
        $route = trim($_SERVER["REQUEST_URI"], "/");
        $expRoute = explode("/", $route);

        $findKey = array_search("install", $expRoute);
        if($findKey) {
            if($findKey == 0) {
                unset($expRoute[$findKey]);
            } else {
                for($i = 0; $i <= $findKey; $i++) {
                    unset($expRoute[$i]);
                }
            }
        }

        $newRoute = implode("/", $expRoute);

        if($newRoute == "") {
            $newRoute = "/";
        }

        if(isset($this->routes[$newRoute])) {
            if(preg_match("@$newRoute@", $this->routes[$newRoute]["pattern"],$matches)) {
                if(is_callable($this->routes[$newRoute]["class"])) {
                    $newClass = new $this->routes[$newRoute]["class"][0]();

                    call_user_func_array([$newClass, $this->routes[$newRoute]["class"][1]], $matches);
                }
            }
        } else {
            echo "Bulunamadı";
        }

    }
}