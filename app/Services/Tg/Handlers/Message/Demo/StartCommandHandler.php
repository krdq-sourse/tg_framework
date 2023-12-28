<?php

namespace App\Services\Tg\Handlers\Message\Demo;

use App\Services\Tg\Builders\ButtonBuilder;
use App\Services\Tg\Handlers\Message\Handler;
use App\Services\Tg\Models\Message\TgMessage;

class StartCommandHandler extends Handler
{

    public function handle(TgMessage $tgMessage)
    {
        $inlineButton = ButtonBuilder::inlineButton('Кнопка', 'callback_data');
        $inlineKeyboard = ButtonBuilder::inlineKeyboard([[$inlineButton]]);
        $this->tgHelper->sendKeyboardMessage($tgMessage->chat->id, 'hui', $inlineKeyboard);

    }
}
