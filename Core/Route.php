<?php

namespace Core;

class Route
{
    public $routes = [];

    public function addRoute($httpMethod, $uri, $controller, $middleware = null)
    {

        if (is_string($controller)) {
            $data  = [
                'class' => $controller,
                'method' =>  '__invoke',
                'middleware' => $middleware
            ];
        } else if (is_array($controller)) {
            $data =  [
                'class' => $controller[0],
                'method' =>  $controller[1],
                'middleware' => $middleware
            ];
        }

        $this->routes[$httpMethod][$uri] = $data;
    }

    public function get($uri, $controller, $middleware = null)
    {
        $this->addRoute('GET', $uri, $controller, $middleware);
        return $this;
    }

    public function post($uri, $controller, $middleware = null)
    {
        $this->addRoute('POST', $uri, $controller,  $middleware);
        return $this;
    }

    public function put($uri, $controller, $middleware = null)
    {
        $this->addRoute('PUT', $uri, $controller,  $middleware);
        return $this;
    }

    public function delete($uri, $controller, $middleware = null)
    {
        $this->addRoute('DELETE', $uri, $controller,  $middleware);
        return $this;
    }

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        $httpMethod = request()->post('__method', $_SERVER['REQUEST_METHOD']);

        if (!isset($this->routes[$httpMethod][$uri])) {
            http_response_code(404);
            echo "404 - Not Found";
            exit;
        }

        $routeInfo = $this->routes[$httpMethod][$uri];
        $class = $routeInfo['class'];
        $method = $routeInfo['method'];
        $middleware = $routeInfo['middleware'];

        if ($middleware) {
            $m = new $middleware;
            $m->handle();
        }

        $controller = new $class();
        $controller->$method();
    }
}
