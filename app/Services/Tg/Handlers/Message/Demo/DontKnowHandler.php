<?php

namespace App\Services\Tg\Handlers\Message\Demo;

use App\Services\Tg\Constants\StickerConstants;
use App\Services\Tg\Handlers\Message\Handler;
use App\Services\Tg\Models\Message\TgMessage;

class DontKnowHandler extends Handler
{

    public function handle(TgMessage $tgMessage)
    {
        sleep(1);
        $context = [
            'reply_to_message_id' => $tgMessage->messageId
        ];
        $this->tgHelper->sendSticker($tgMessage->chat->id, StickerConstants::DISGRUNTLED_CAT, $context);
    }
}
