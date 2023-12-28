<?php


use App\Services\Tg\Handlers\CallbackQuery\Demo\StartCallbackQueryHandler;
use App\Services\Tg\Routes\CallbackQueryRouter;

CallbackQueryRouter::add('callback_data', StartCallbackQueryHandler::class);
