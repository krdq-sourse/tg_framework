<?php

namespace App\Services\Tg;

use App\Services\Tg\Models\CallbackQuery\CallbackQuery;
use App\Services\Tg\Models\Message\TgMessage;
use App\Services\Tg\Routes\CallbackQueryRouter;
use App\Services\Tg\Routes\MessageRouter;
use App\Services\Tg\Routes\TgCommandRouter;
use Illuminate\Contracts\Container\BindingResolutionException;
use Longman\TelegramBot\Telegram;

class TelegramBotService
{
    protected Telegram $telegram;
    protected TgCommandRouter $commandRouter;

    public function __construct(Telegram $telegram)
    {
        $this->telegram = $telegram;
    }

    /**
     * @throws BindingResolutionException
     */
    public function handleWebhook($update): void
    {
        if (isset($update['message'])) {
            $tgMessage = new TgMessage($update['message']);
            MessageRouter::route($tgMessage);
        }
        if (isset($update['callback_query'])) {
            $callbackQuery = new CallbackQuery($update['callback_query']);
            CallbackQueryRouter::route($callbackQuery);
        }
    }


    /**
     * @throws BindingResolutionException
     */
    protected function handleTextMessage(TgMessage $tgMessage): void
    {
        MessageRouter::route($tgMessage);
    }

}
