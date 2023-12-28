<?php

namespace App\Services\Tg\Models\CallbackQuery;

use App\Services\Tg\Models\Message\TgMessage;
use App\Services\Tg\Models\Message\TgUser;

class CallbackQuery
{
    private $id;
    private ?TgUser $from;
    private ?TgMessage $message;
    private $inlineMessageId;
    private $chatInstance;
    private $data;
    private $gameShortName;

    public function __construct($callbackQueryData)
    {
        $this->id = $callbackQueryData['id'] ?? null;
        $this->from = isset($callbackQueryData['from']) ? new TgUser($callbackQueryData['from']) : null;
        $this->message = isset($callbackQueryData['message']) ? new TgMessage($callbackQueryData['message']) : null;
        $this->inlineMessageId = $callbackQueryData['inline_message_id'] ?? null;
        $this->chatInstance = $callbackQueryData['chat_instance'] ?? null;
        $this->data = $callbackQueryData['data'] ?? null;
        $this->gameShortName = $callbackQueryData['game_short_name'] ?? null;
    }

    // Методы доступа (getters) для свойств
    public function getId()
    {
        return $this->id;
    }

    public function getChatId()
    {
        return $this->message?->getChat()->getId();
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getInlineMessageId()
    {
        return $this->inlineMessageId;
    }

    public function getChatInstance()
    {
        return $this->chatInstance;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getGameShortName()
    {
        return $this->gameShortName;
    }

}
