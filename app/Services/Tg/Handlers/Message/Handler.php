<?php

namespace App\Services\Tg\Handlers\Message;

use App\Services\Tg\Helpers\TelegramHelper;

abstract class Handler implements MessageHandler
{
//    protected TgMessage $tgMessage;
    protected TelegramHelper $tgHelper;

    public function __construct(TelegramHelper $telegramHelper)
    {
        $this->tgHelper = $telegramHelper;
    }

}
