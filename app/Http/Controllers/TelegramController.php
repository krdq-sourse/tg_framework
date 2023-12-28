<?php

namespace App\Http\Controllers;

use App\Services\Tg\TelegramBotService;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    protected $telegramBotService;

    public function __construct(TelegramBotService $telegramBotService)
    {
        $this->telegramBotService = $telegramBotService;
    }

    public function webhook(Request $request)
    {
        $update = json_decode($request->getContent(), true);
        $this->telegramBotService->handleWebhook($update);

        return response()->json(['status' => 'success']);
    }
}
