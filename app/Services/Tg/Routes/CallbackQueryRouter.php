<?php

namespace App\Services\Tg\Routes;

use App\Services\Tg\Models\CallbackQuery\CallbackQuery;

class CallbackQueryRouter
{
    protected static $routes = [];

    public static function add($callbackData, $handlerClass, array $middleware = [])
    {
        self::$routes[] = [
            'callback_data' => $callbackData,
            'handler' => $handlerClass,
            'middleware' => $middleware
        ];
    }

    public static function route(CallbackQuery $callbackQuery)
    {
        foreach (self::$routes as $route) {
            if ($route['callback_data'] === $callbackQuery->getData()) {
                $handler = app()->make($route['handler']);
                $middlewareStack = self::buildMiddlewareStack($route['middleware'], $handler);

                return $middlewareStack($callbackQuery);
            }
        }
    }

    protected static function buildMiddlewareStack(array $middleware, $handler)
    {
        $coreFunction = function ($callbackQuery) use ($handler) {
            return $handler->handle($callbackQuery);
        };

        $stack = array_reduce(array_reverse($middleware), function ($next, $middlewareClass) {
            return function ($callbackQuery) use ($next, $middlewareClass) {
                $middlewareInstance = app()->make($middlewareClass);
                return $middlewareInstance->handle($callbackQuery, $next);
            };
        }, $coreFunction);

        return $stack;
    }
}
