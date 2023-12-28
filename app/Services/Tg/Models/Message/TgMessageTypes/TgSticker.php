<?php

namespace App\Services\Tg\Models\Message\TgMessageTypes;

class TgSticker
{
    public $fileId;
    public $fileUniqueId;
    public $width;
    public $height;
    public $isAnimated;

    public function __construct($stickerData)
    {
        $this->fileId = $stickerData['file_id'] ?? null;
        $this->fileUniqueId = $stickerData['file_unique_id'] ?? null;
        $this->width = $stickerData['width'] ?? null;
        $this->height = $stickerData['height'] ?? null;
        $this->isAnimated = $stickerData['is_animated'] ?? false;
    }
}
