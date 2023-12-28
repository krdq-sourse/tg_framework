<?php

namespace App\Services\Tg\Contracts;

use App\Services\Tg\Models\Message\TgMessage;

interface TelegramCommand
{
    public function handle(TgMessage $tgMessage);
}
