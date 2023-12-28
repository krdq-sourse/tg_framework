<?php

namespace App\Services\Tg\Models\Message\TgMessageTypes;

class TgPhoto
{
    public $fileId;
    public $fileUniqueId;
    public $width;
    public $height;
    public $fileSize;

    public function __construct($photoData)
    {
        $this->fileId = $photoData['file_id'] ?? null;
        $this->fileUniqueId = $photoData['file_unique_id'] ?? null;
        $this->width = $photoData['width'] ?? null;
        $this->height = $photoData['height'] ?? null;
        $this->fileSize = $photoData['file_size'] ?? null;
    }
}
