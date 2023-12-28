<?php

namespace App\Services\Tg\Middleware;

use App\Services\Tg\Models\Message\TgMessage;

class PrivateChatMiddleware extends Middleware
{
    public function handle(TgMessage $tgMessage, callable $next)
    {
        if ($tgMessage->chat->isPrivateChat()) {
            return $next($tgMessage);
        }

        return null;
    }
}

