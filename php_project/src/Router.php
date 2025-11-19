<?php
namespace App;

class Router {
    private array $routes = [];

    public function add(string $url, callable $action): void {
        $this->routes[$url] = $action;
    }

    public function run(): void {
        $uri = $_SERVER['REQUEST_URI'];
        if (isset($this->routes[$uri])) {
            call_user_func($this->routes[$uri]);
        } else {
            http_response_code(404);
            echo "404 — Page not found";
        }
    }
}