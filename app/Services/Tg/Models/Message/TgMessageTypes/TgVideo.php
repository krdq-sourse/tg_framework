<?php

namespace App\Services\Tg\Models\Message\TgMessageTypes;

class TgVideo
{
    public $fileId;
    public $fileUniqueId;
    public $width;
    public $height;
    public $duration;
    public $mimeType;
    public $fileSize;

    public function __construct($videoData)
    {
        $this->fileId = $videoData['file_id'] ?? null;
        $this->fileUniqueId = $videoData['file_unique_id'] ?? null;
        $this->width = $videoData['width'] ?? null;
        $this->height = $videoData['height'] ?? null;
        $this->duration = $videoData['duration'] ?? null;
        $this->mimeType = $videoData['mime_type'] ?? null;
        $this->fileSize = $videoData['file_size'] ?? null;
    }
}
