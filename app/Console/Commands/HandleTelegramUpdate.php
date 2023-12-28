<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Entities\Update;
class HandleTelegramUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:handle-telegram-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $update = new Update(json_decode($this->argument('update'), true), env('TELEGRAM_BOT_USERNAME'));

        if ($message = $update->getMessage()) {
            $chatId = $message->getChat()->getId();
            $text = $message->getText();

            if ($text === '/start') {
                Request::sendMessage([
                    'chat_id' => $chatId,
                    'text'    => 'Welcome to our Telegram bot!'
                ]);
            }
        }
    }
}
