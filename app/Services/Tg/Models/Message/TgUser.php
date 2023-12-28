<?php

namespace App\Services\Tg\Models\Message;

class TgUser
{
    public $id;
    public $isBot;
    public $firstName;
    public $username;
    public $languageCode;

    public function __construct($userData)
    {
        $this->id = $userData['id'] ?? null;
        $this->isBot = $userData['is_bot'] ?? false;
        $this->firstName = $userData['first_name'] ?? '';
        $this->username = $userData['username'] ?? '';
        $this->languageCode = $userData['language_code'] ?? '';
    }
}
