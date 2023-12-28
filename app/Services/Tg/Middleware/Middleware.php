<?php

namespace App\Services\Tg\Middleware;

use App\Services\Tg\Models\Message\TgMessage;

abstract class Middleware
{
    public function handle(TgMessage $tgMessage, callable $next)
    {
        // Перед выполнением роута

        $response = $next($tgMessage);

        // После выполнения роута

        return $response;
    }
}
