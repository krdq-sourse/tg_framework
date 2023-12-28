<?php

namespace App\Services\Tg\Handlers;

use App\Services\Tg\Models\Message\TgMessage;

interface MessageHandler
{
    /**
     * @param TgMessage $tgMessage
     * @return mixed
     */
    public function handle(TgMessage $tgMessage);
}
