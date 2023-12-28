<?php

namespace App\Services\Tg\Middleware;

use App\Services\Tg\Models\CallbackQuery\CallbackQuery;
use App\Services\Tg\Models\Message\TgMessage;

class PrivateChatMiddleware extends Middleware
{
    public function handle(TgMessage|CallbackQuery $tgEntity, callable $next)
    {
        if ($tgEntity->getChat()->isPrivateChat()) {
            return $next($tgEntity);
        }

        return null;
    }
}

