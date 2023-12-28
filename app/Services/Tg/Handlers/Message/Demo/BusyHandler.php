<?php

namespace App\Services\Tg\Handlers\Message\Demo;

use App\Services\Tg\Constants\StickerConstants;
use App\Services\Tg\Handlers\Message\Handler;
use App\Services\Tg\Models\Message\TgMessage;
use Longman\TelegramBot\Request as TelegramRequest;

class BusyHandler extends Handler
{
    public function handle(TgMessage $tgMessage)
    {
        TelegramRequest::sendMessage([
            'chat_id' => $tgMessage->chat->id,
            'text' => 'пошел нахуй',
            'reply_to_message_id' => $tgMessage->messageId
        ]);
        sleep(2);
        TelegramRequest::sendMessage([
            'chat_id' => $tgMessage->chat->id,
            'text' => 'не тегай меня блять',
        ]);
        sleep(2);
        TelegramRequest::sendMessage([
            'chat_id' => $tgMessage->chat->id,
            'text' => 'я занят блять',
        ]);
        sleep(1);
        TelegramRequest::sendSticker([
            'chat_id' => $tgMessage->chat->id,
            'sticker' => StickerConstants::DISGRUNTLED_CAT,
        ]);
    }
}
