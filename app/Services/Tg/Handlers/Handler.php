<?php

namespace App\Services\Tg\Handlers;

use App\Services\Tg\Helpers\TelegramHelper;
use App\Services\Tg\Models\Message\TgMessage;

abstract class Handler implements MessageHandler
{
//    protected TgMessage $tgMessage;
    protected TelegramHelper $tgHelper;

    public function __construct()
    {
//        $this->tgMessage = $tgMessage;
        $this->tgHelper = app(TelegramHelper::class);
    }

}
