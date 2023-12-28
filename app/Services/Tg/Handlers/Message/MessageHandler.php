<?php

namespace App\Services\Tg\Handlers\Message;

use App\Services\Tg\Models\Message\TgMessage;

interface MessageHandler
{
    /**
     * @param TgMessage $tgMessage
     * @return mixed
     */
    public function handle(TgMessage $tgMessage);
}
