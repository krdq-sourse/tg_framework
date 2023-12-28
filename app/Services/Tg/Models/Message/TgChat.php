<?php


namespace App\Services\Tg\Models\Message;

class TgChat
{
    public $id;
    public $type;

    public function __construct($chatData)
    {
        $this->id = $chatData['id'] ?? null;
        $this->type = $chatData['type'] ?? '';
    }

    public function isGroupChat()
    {
        return $this->type === 'group' || $this->type === 'supergroup';
    }

    public function isPrivateChat()
    {
        return $this->type === 'private';
    }

    public function getId()
    {
        return $this->id;
    }

}
