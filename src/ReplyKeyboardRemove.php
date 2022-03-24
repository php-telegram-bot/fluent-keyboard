<?php

namespace PhpTelegramBot\FluentKeyboard;

/**
 * @method self selective(bool $value = true)
 */
class ReplyKeyboardRemove extends FluentEntity
{

    protected array $data = [
        'remove_keyboard' => true,
    ];

    protected array $defaults = [
        'selective' => true,
    ];

}