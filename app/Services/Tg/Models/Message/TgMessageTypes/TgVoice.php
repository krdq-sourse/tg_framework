<?php

namespace App\Services\Tg\Models\Message\TgMessageTypes;

class TgVoice
{
    public $fileId;
    public $fileUniqueId;
    public $duration;
    public $mimeType;
    public $fileSize;

    public function __construct($voiceData)
    {
        $this->fileId = $voiceData['file_id'] ?? null;
        $this->fileUniqueId = $voiceData['file_unique_id'] ?? null;
        $this->duration = $voiceData['duration'] ?? null;
        $this->mimeType = $voiceData['mime_type'] ?? null;
        $this->fileSize = $voiceData['file_size'] ?? null;
    }
}
