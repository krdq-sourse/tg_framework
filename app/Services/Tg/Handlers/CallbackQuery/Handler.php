<?php

namespace App\Services\Tg\Handlers\CallbackQuery;

use App\Services\Tg\Helpers\TelegramHelper;

abstract class Handler implements CallbackQueryHandler
{
    protected TelegramHelper $tgHelper;

    public function __construct()
    {
        $this->tgHelper = app(TelegramHelper::class);
    }

}
