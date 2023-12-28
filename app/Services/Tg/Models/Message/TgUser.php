<?php

namespace App\Services\Tg\Models\Message;

use Longman\TelegramBot\Request as TelegramRequest;


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

    public function getAvatarUrl()
    {
        $response = TelegramRequest::getUserProfilePhotos(['user_id' => $this->id, 'limit' => 1]);

        if ($response->isOk() && $response->getResult()->getTotalCount() > 0) {
            $photos = $response->getResult()->getPhotos();
            if (!empty($photos)) {
                $photo = $photos[0][0];
                return $photo->getFileUrl();
            }
        }

        return null;
    }

}
