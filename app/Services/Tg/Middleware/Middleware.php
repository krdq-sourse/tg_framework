<?php

namespace App\Services\Tg\Middleware;

use App\Services\Tg\Models\CallbackQuery\CallbackQuery;
use App\Services\Tg\Models\Message\TgMessage;

abstract class Middleware
{
    public function handle(TgMessage|CallbackQuery $tgEntity, callable $next)
    {
        // Перед выполнением роута

        $response = $next($tgEntity);

        // После выполнения роута

        return $response;
    }
}
