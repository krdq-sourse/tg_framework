<?php

namespace App\Services\Tg\Models\Message;

use App\Services\Tg\Models\Message\TgMessageTypes\TgPhoto;
use App\Services\Tg\Models\Message\TgMessageTypes\TgSticker;
use App\Services\Tg\Models\Message\TgMessageTypes\TgVideo;
use App\Services\Tg\Models\Message\TgMessageTypes\TgVoice;

class TgMessage
{
    public $messageId;
    public TgUser $user;
    public $date;
    public $text;
    public $chatType;
    public TgChat $chat;

    public ?TgPhoto $photo;
    public ?TgVoice $voice;
    public ?TgSticker $sticker;
    public ?TgVoice $video;

    public function __construct($messageData)
    {
        $this->messageId = $messageData['message_id'] ?? null;
        $this->user = new TgUser($messageData['from'] ?? []);
        $this->date = $messageData['date'] ?? null;
        $this->text = $messageData['text'] ?? '';
        $this->chatType = $messageData['chat']['type'] ?? '';
        $this->chat = new TgChat($messageData['chat'] ?? []);
        $this->photo = !empty($messageData['photo']) ? new TgPhoto($messageData['photo']) : null;
        $this->voice = !empty($messageData['voice']) ? new TgVoice($messageData['voice']) : null;
        $this->sticker = !empty($messageData['sticker']) ? new TgSticker($messageData['sticker']) : null;
        $this->video = !empty($messageData['video']) ? new TgVideo($messageData['video']) : null;
    }

    public function isCommand(): bool
    {
        return !empty($this->text) && $this->text[0] === '/';
    }

    public function getChat(): TgChat
    {
        return $this->chat;
    }

    public function hasSticker(): bool
    {
        return !empty($this->sticker);
    }

    public function hasPhoto(): bool
    {
        return !empty($this->photo);
    }

    public function hasVoice(): bool
    {
        return !empty($this->voice);
    }

    public function getType()
    {
        if ($this->isCommand()) {
            return 'command';
        }

        if ($this->text) {
            return 'text';
        } elseif ($this->photo) {
            return 'photo';
        } elseif ($this->sticker) {
            return 'sticker';
        } elseif ($this->video) {
            return 'video';
        }

        return 'unknown';
    }

}
