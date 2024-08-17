<?php
class Router
{
    private static array $routes = [];

    public static function get($url, $action): void
    {
        self::$routes['GET'][$url] = $action;
    }

    public static function post($url, $action): void
    {
        self::$routes['POST'][$url] = $action;
    }

    public static function dispatch($url, $method): void
    {
        foreach (self::$routes[$method] as $route => $action)
        {
            $pattern = preg_replace('/\{[a-zA-Z]+\}/', '([a-zA-Z0-9_-]+)', $route);
            if (preg_match("#^$pattern$#", $url, $matches)) {
                array_shift($matches);
                [$controller, $method] = $action;
                $controller = new $controller;
                $controller->$method(...$matches);
                return;
            }
        }
        echo "404 Not Found";
    }
}
