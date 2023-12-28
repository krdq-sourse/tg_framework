<?php

namespace App\Services\Tg\Handlers\CallbackQuery;

use App\Services\Tg\Models\CallbackQuery\CallbackQuery;

interface CallbackQueryHandler
{
    /**
     * @param CallbackQuery $callbackQuery
     * @return mixed
     */
    public function handle(CallbackQuery $callbackQuery);
}
