<?php

namespace App\Services\Tg\Handlers\CallbackQuery\Demo;

use App\Services\Tg\Constants\StickerConstants;
use App\Services\Tg\Handlers\CallbackQuery\Handler;
use App\Services\Tg\Models\CallbackQuery\CallbackQuery;

class StartCallbackQueryHandler extends Handler
{

    /**
     * @inheritDoc
     */
    public function handle(CallbackQuery $callbackQuery)
    {
        $this->tgHelper->deleteMessage($callbackQuery->getChatId(), $callbackQuery->getMessage()->messageId);
        $text = $callbackQuery->getFrom()->firstName . ', пошел нахуй!';
        $this->tgHelper->sendMessage($callbackQuery->getChatId(), $text);
        sleep(1);
        $this->tgHelper->sendSticker($callbackQuery->getChatId(), StickerConstants::DISGRUNTLED_CAT);
    }
}
