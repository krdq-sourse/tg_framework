<?php

use App\Services\Tg\Handlers\Demo\{BusyHandler, ShowMeHandler, StickerHandler};
use App\Services\Tg\Middleware\{GroupChatMiddleware, PrivateChatMiddleware};
use App\Services\Tg\Routes\TextMessageRouter;

TextMessageRouter::text('/@logger_sekfw3iofmsa_bot/', BusyHandler::class, [GroupChatMiddleware::class]);
TextMessageRouter::text('/хуй/', ShowMeHandler::class, [GroupChatMiddleware::class]);
TextMessageRouter::sticker('', StickerHandler::class, [PrivateChatMiddleware::class]);
