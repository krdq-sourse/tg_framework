<?php

namespace App\Services\Tg\Middleware;

use App\Services\Tg\Models\Message\TgMessage;
use App\Services\Tg\Models\CallbackQuery\CallbackQuery;


class GroupChatMiddleware extends Middleware
{
    public function handle(TgMessage|CallbackQuery $tgEntity, callable $next)
    {
        if ($tgEntity->getChat()->isGroupChat()) {
            return $next($tgEntity);
        }

        return null;
    }
}
