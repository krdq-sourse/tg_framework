<?php

namespace App\Services\Tg\Helpers;

use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request as TelegramRequest;

class TelegramHelper
{
    /**
     * @param $chatId
     * @param $stickerFileId
     * @return ServerResponse
     */
    public function sendSticker($chatId, $stickerFileId): ServerResponse
    {
        $data = [
            'chat_id' => $chatId,
            'sticker' => $stickerFileId
        ];

        return TelegramRequest::sendSticker($data);
    }

    /**
     * @param $chatId
     * @param $text
     * @return ServerResponse
     * @throws TelegramException
     */
    public function sendMessage($chatId, $text): ServerResponse
    {
        $data = [
            'chat_id' => $chatId,
            'text' => $text
        ];

        return TelegramRequest::sendMessage($data);
    }

    /**
     * @param $chatId
     * @param $replyToMessageId
     * @param $text
     * @return ServerResponse
     * @throws TelegramException
     */
    public function replyToMessage($chatId, $replyToMessageId, $text): ServerResponse
    {
        $data = [
            'chat_id' => $chatId,
            'text' => $text,
            'reply_to_message_id' => $replyToMessageId
        ];

        return TelegramRequest::sendMessage($data);
    }


    /**
     * @param $chatId
     * @param string $photoPath
     * @param string $caption
     * @return ServerResponse
     */
    public function sendPhoto($chatId, string $photoPath, string $caption = ''): ServerResponse
    {
        $data = [
            'chat_id' => $chatId,
            'photo' => $photoPath,
            'caption' => $caption
        ];

        return TelegramRequest::sendPhoto($data);
    }

    /**
     * @param $chatId
     * @param $video
     * @param string $caption
     * @return ServerResponse
     */
    public function sendVideo($chatId, $video, string $caption = ''): ServerResponse
    {
        $data = [
            'chat_id' => $chatId,
            'video' => $video,
            'caption' => $caption
        ];

        return TelegramRequest::sendVideo($data);
    }

    /**
     * @param $chatId
     * @param $voice
     * @param string $caption
     * @return ServerResponse
     */
    public function sendVoice($chatId, $voice, string $caption = ''): ServerResponse
    {
        $data = [
            'chat_id' => $chatId,
            'voice' => $voice,
            'caption' => $caption
        ];

        return TelegramRequest::sendVoice($data);
    }

    /**
     * @param $chatId
     * @param $videoNote
     * @return ServerResponse
     */
    public function sendVideoNote($chatId, $videoNote): ServerResponse
    {
        $data = [
            'chat_id' => $chatId,
            'video_note' => $videoNote
        ];

        return TelegramRequest::sendVideoNote($data);
    }

}
