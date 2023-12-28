<?php

namespace App\Services\Tg;

use App\Services\Tg\Handlers\Demo\BusyHandler;
use App\Services\Tg\Handlers\Demo\ShowMeHandler;
use App\Services\Tg\Handlers\Demo\StickerHandler;
use App\Services\Tg\Middleware\GroupChatMiddleware;
use App\Services\Tg\Middleware\PrivateChatMiddleware;
use App\Services\Tg\Models\Message\TgMessage;
use App\Services\Tg\Routes\TextMessageRouter;
use App\Services\Tg\Routes\TgCommandRouter;
use Illuminate\Contracts\Container\BindingResolutionException;
use Longman\TelegramBot\Telegram;

class TelegramBotService
{
    protected Telegram $telegram;
    protected TgCommandRouter $commandRouter;

    public function __construct(Telegram $telegram, TgCommandRouter $commandRouter)
    {
        $this->telegram = $telegram;
        $this->commandRouter = $commandRouter;

        $this->setRoutes();
    }

    public function handleWebhook($update)
    {
        if (isset($update['message'])) {
            $tgMessage = new TgMessage($update['message']);

            if ($tgMessage->isCommand()) {
                $this->commandRouter->route($tgMessage);
            } else {
                TextMessageRouter::route($tgMessage);
            }
        }
    }


    /**
     * @throws BindingResolutionException
     */
    protected function handleTextMessage(TgMessage $tgMessage): void
    {
        TextMessageRouter::route($tgMessage);
    }

    /**
     *
     * Это по сути роутер, принимает руглярки, второй мараметр массив с мидлварами
     * @return void
     */
    protected function setRoutes(): void
    {

//        пример
//        TextMessageRouter::video('/еще-одно-регулярное-выражение/i', VideoHandler::class, []);
//        TextMessageRouter::photo('/какое-то-регулярное-выражение/i', PhotoHandler::class, []);

    }

}
