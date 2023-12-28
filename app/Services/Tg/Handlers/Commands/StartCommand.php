<?php

namespace App\Services\Tg\Handlers\Commands;

use App\Services\Tg\Contracts\TelegramCommand;
use App\Services\Tg\Models\Message\TgMessage;
use Longman\TelegramBot\Request as TelegramRequest;

class StartCommand implements TelegramCommand
{
    public function handle(TgMessage $tgMessage)
    {
        TelegramRequest::sendMessage([
            'chat_id' => $tgMessage->chat->id,
            'text'    => 'ыыыы блять'
        ]);
    }
}
