<?php

namespace App\Providers;

use App\Services\Tg\Routes\TgCommandRouter;
use App\Services\Tg\TelegramBotService;
use Illuminate\Support\ServiceProvider;
use Longman\TelegramBot\Telegram;

class TelegramBotServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton(Telegram::class, function ($app) {
            $bot_api_key = env('TELEGRAM_BOT_API_KEY');

            return new Telegram($bot_api_key);
        });

        $this->app->singleton(TelegramBotService::class, function ($app) {
            return new TelegramBotService(
                $app->make(Telegram::class),
            );
        });

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        require base_path('routes/bot/message.php');
        require base_path('routes/bot/callbacks.php');
    }
}
