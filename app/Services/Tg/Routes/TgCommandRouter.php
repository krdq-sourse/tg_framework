<?php

namespace App\Services\Tg\Routes;

use App\Services\Tg\Contracts\TelegramCommand;
use App\Services\Tg\Handlers\Commands\StartCommand;
use App\Services\Tg\Models\Message\TgMessage;


class TgCommandRouter
{
    protected $commands = [
        '/start' => StartCommand::class,
        // tbd
    ];

    public function route(TgMessage $tgMessage)
    {
        $commandClass = $this->commands[$tgMessage->text] ?? null;

        if ($commandClass && class_implements($commandClass, TelegramCommand::class)) {
            $command = new $commandClass();
            $command->handle($tgMessage);
        }
    }
}
