<?php

namespace App\Services\Tg\Middleware;

use App\Services\Tg\Models\Message\TgMessage;

class GroupChatMiddleware extends Middleware
{
    public function handle(TgMessage $tgMessage, callable $next)
    {
        if ($tgMessage->chat->isGroupChat()) {
            return $next($tgMessage);
        }

        return null;
    }
}
