<?php
namespace App\Core;
use App\Core\View;

class Router
{
    private $routes = [];

    private function addRoute($route, $controller, $method, $httpMethod)
    {
        $this->routes[$httpMethod][$route] = [
            "controller" => $controller,
            "method" => $method,
        ];
    }

    public function dispatch($httpMethod, $uri)
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        if (isset($this->routes[$httpMethod][$uri])) {
            $data = $this->routes[$httpMethod][$uri];
            $controller = new ($data["controller"])();
            $controller->{$data["method"]}();
        } else {
            http_response_code(404);
            View::render("errors/404.php", "errors_layout.php");
        }
    }

    public function get($route, $controller, $method)
    {
        $this->addRoute($route, $controller, $method, "GET");
    }

    public function post($route, $controller, $method)
    {
        $this->addRoute($route, $controller, $method, "POST");
    }

    public function put($route, $controller, $method)
    {
        $this->addRoute($route, $controller, $method, "PUT");
    }

    public function delete($route, $controller, $method)
    {
        $this->addRoute($route, $controller, $method, "DELETE");
    }
}
