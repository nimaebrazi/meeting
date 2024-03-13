<?php

namespace Meeting\Core;


use Closure;
use Meeting\Exception\ClassNotFoundException;
use Meeting\Exception\MethodNotFoundException;

class Router
{
    private const BASE_CONTROLLER = 'Meeting\\App\\Http\\Controllers\\';
    private array $routes = [];
    private array $parameters = [];
    private Request $request;
    private $current_route;

    public function __construct()
    {
        $this->request = new Request;
        $this->routes = Route::all();
        $this->current_route = $this->findRoute($this->request);
    }

    public function run()
    {
        $this->dispatch($this->current_route, $this->parameters);
    }

    private function findRoute(Request $request)
    {
        foreach ($this->routes as $route) {
            if ($request->method === $route['method'] && $this->isUriMatched($route)) {
//                Middleware::resolve($route['middleware']);

                return $route;
            }
        }

//        abort();
    }

    private function isUriMatched(array $route)
    {
        $pattern = '/^' . str_replace(['/', '{', '}'], ['\/', '(?<', '>[-%\w]+)'], $route['uri']) . '$/';
        $result = preg_match($pattern, $this->request->uri, $matches);

        if (!$result) {
            return false;
        }

        foreach ($matches as $key => $value) {
            if (!is_int($key)) {
                $this->parameters[$key] = $value;

                $this->dispatch($this->current_route, $this->parameters);
            }
        }

        return true;
    }

    /**
     * @throws MethodNotFoundException
     * @throws ClassNotFoundException
     */
    private function dispatch(?array $route, array $parameters = []): void
    {
        $action = $route['controller'] ?? null;

        if (is_null($action)) {
            return;
        }

        if (is_callable($action) && $action instanceof Closure) {
            call_user_func($action, ...$parameters);
        }

        if (is_array($action)) {
            $class = self::BASE_CONTROLLER . $action[0];

            if (!class_exists($class)) {
                throw new ClassNotFoundException("Controller [$class] not exists.");
            }

            $method = $action[1];

            if (!method_exists($class, $method)) {
                throw new MethodNotFoundException("Method [$method], in controller [$class] not found.");
            }

            $controller = new $class;

            $controller->$method(...$parameters);
        }
    }

}