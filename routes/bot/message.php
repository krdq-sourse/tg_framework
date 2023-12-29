<?php

use App\Services\Tg\Handlers\Message\Demo\{
    DontKnowHandler,
    ShowMeHandler
};
use App\Services\Tg\Handlers\Message\Demo\BusyHandler;
use App\Services\Tg\Handlers\Message\Demo\StartCommandHandler;
use App\Services\Tg\Handlers\Message\Demo\StickerHandler;
use App\Services\Tg\Middleware\{GroupChatMiddleware, PrivateChatMiddleware};
use App\Services\Tg\Routes\MessageRouter;

MessageRouter::text('/@logger_sekfw3iofmsa_bot/', BusyHandler::class, [GroupChatMiddleware::class]);
MessageRouter::text('/не\s+знаю.*/i', DontKnowHandler::class, [GroupChatMiddleware::class]);
MessageRouter::text('/хуй/', ShowMeHandler::class, [GroupChatMiddleware::class]);
MessageRouter::sticker('', StickerHandler::class, [PrivateChatMiddleware::class]);
MessageRouter::command('start', StartCommandHandler::class);
//        пример
//        MessageRouter::video('/еще-одна-регулярка-блять/i', VideoHandler::class, []);
//        MessageRouter::photo('/регулярка-блять/i', PhotoHandler::class, []);
