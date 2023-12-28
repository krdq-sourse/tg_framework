<?php

namespace App\Services\Tg\Routes;

use App\Services\Tg\Handlers\Handler;
use App\Services\Tg\Models\Message\TgMessage;
use Illuminate\Contracts\Container\BindingResolutionException;

class TextMessageRouter
{
    protected static array $routes = [];


    public static function text($pattern, $handlerClass, array $middleware = [])
    {
        self::addRoute($pattern, $handlerClass, $middleware, 'text');
    }

    public static function photo($pattern, $handlerClass, array $middleware = [])
    {
        self::addRoute($pattern, $handlerClass, $middleware, 'photo');
    }

    public static function sticker($pattern, $handlerClass, array $middleware = [])
    {
        self::addRoute($pattern, $handlerClass, $middleware, 'sticker');
    }

    public static function video($pattern, $handlerClass, array $middleware = [])
    {
        self::addRoute($pattern, $handlerClass, $middleware, 'video');
    }

    /**
     * @param string $pattern
     * @param string $handlerClass
     * @param array $middleware
     * @param string $type
     * @return void
     */
    protected static function addRoute(string $pattern, string $handlerClass, array $middleware, string $type): void
    {
        self::$routes[] = [
            'pattern' => $pattern,
            'handler' => $handlerClass,
            'middleware' => $middleware,
            'type' => $type
        ];
    }


    /**
     * @param TgMessage $tgMessage
     * @return mixed|void
     * @throws BindingResolutionException
     */
    public static function route(TgMessage $tgMessage)
    {
        foreach (self::$routes as $route) {
            if ($route['type'] === $tgMessage->getType()) {
                if (!empty($route['pattern']) && !preg_match($route['pattern'], $tgMessage->text, $matches)) {
                    continue;
                }

                $handler = app()->make($route['handler']);
                $middlewareStack = self::buildMiddlewareStack($route['middleware'], $handler);

                return $middlewareStack($tgMessage);
            }
        }
    }

    /**
     * @param array $middleware
     * @param $handler
     * @return \Closure
     */
    protected static function buildMiddlewareStack(array $middleware, $handler): \Closure
    {
        $coreFunction = function ($tgMessage) use ($handler) {
            return $handler->handle($tgMessage);
        };

        return array_reduce(array_reverse($middleware), function ($next, $middlewareClass) {
            return function ($tgMessage) use ($next, $middlewareClass) {
                $middlewareInstance = app()->make($middlewareClass);
                return $middlewareInstance->handle($tgMessage, $next);
            };
        }, $coreFunction);
    }
}