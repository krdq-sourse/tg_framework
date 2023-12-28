<?php

namespace App\Services\Tg\Handlers\Demo;

use App\Services\Tg\Constants\StickerConstants;
use App\Services\Tg\Handlers\Handler;
use App\Services\Tg\Models\Message\TgMessage;

class StickerHandler extends Handler
{
    public function handle(TgMessage $tgMessage)
    {
        $this->tgHelper->sendSticker($tgMessage->chat->id, StickerConstants::DISGRUNTLED_CAT);
    }
}
