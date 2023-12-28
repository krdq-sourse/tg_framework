<?php

namespace App\Services\Tg\Handlers\Message\Demo;

use App\Services\Tg\Constants\StickerConstants;
use App\Services\Tg\Handlers\Message\Handler;
use App\Services\Tg\Models\Message\TgMessage;

class StickerHandler extends Handler
{
    public function handle(TgMessage $tgMessage)
    {
        $this->tgHelper->sendSticker($tgMessage->chat->id, StickerConstants::DISGRUNTLED_CAT);
    }
}
