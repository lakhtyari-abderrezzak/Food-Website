<?php 

class Router 
{
    private $routes = [];

    function add($uri, $controller) {
        $this->routes[$uri] = $controller;
    }
    public function route($uri) {
        if (array_key_exists($uri, $this->routes)) {
            require $this->routes[$uri];
        } else {
            http_response_code(404);
            require 'views/404.view.php';
        }
    }
}