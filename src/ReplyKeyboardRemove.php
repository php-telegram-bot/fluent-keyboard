<?php

namespace PhpTelegramBot\FluentKeyboard;

/**
 * @method self selective(bool $value = true)
 */
class ReplyKeyboardRemove extends FluentEntity
{

    protected $data = [
        'remove_keyboard' => true,
    ];

    protected $defaults = [
        'selective' => true,
    ];

}