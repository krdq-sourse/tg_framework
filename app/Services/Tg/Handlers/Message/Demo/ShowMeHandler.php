<?php

namespace App\Services\Tg\Handlers\Message\Demo;

use App\Services\Tg\Handlers\Message\Handler;
use App\Services\Tg\Models\Message\TgMessage;
use Illuminate\Support\Facades\Storage;

class ShowMeHandler extends Handler
{

    public function handle(TgMessage $tgMessage)
    {
        $filePath = Storage::disk('public')->path('cat.jpg');
        $caption = 'ебать я крассивый';

        $this->tgHelper->sendPhoto($tgMessage->chat->id, $filePath, $caption);
    }
}
