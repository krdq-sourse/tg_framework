<?php

namespace App\Services\Tg\Builders;

use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Entities\InlineKeyboardButton;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Entities\KeyboardButton;

class ButtonBuilder
{
    public static function inlineButton($text, $callbackData)
    {
        return new InlineKeyboardButton(['text' => $text, 'callback_data' => $callbackData]);
    }

    public static function inlineKeyboard(array $buttons)
    {
        return new InlineKeyboard(...$buttons);
    }

    public static function keyboardButton($text, $requestContact = false, $requestLocation = false)
    {
        return new KeyboardButton([
            'text' => $text,
            'request_contact' => $requestContact,
            'request_location' => $requestLocation
        ]);
    }

    public static function keyboard(array $buttons, $resizeKeyboard = true, $oneTimeKeyboard = false)
    {
        return new Keyboard([
            'keyboard' => $buttons,
            'resize_keyboard' => $resizeKeyboard,
            'one_time_keyboard' => $oneTimeKeyboard
        ]);
    }

}
