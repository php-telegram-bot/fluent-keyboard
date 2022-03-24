<?php

namespace PhpTelegramBot\FluentKeyboard\ReplyKeyboard;

use PhpTelegramBot\FluentKeyboard\Button;

/**
 * @method $this type(string $type)
 */
class KeyboardButtonPollType extends Button
{

    protected $data = [];

    public static function any()
    {
        return new static();
    }

    public static function quiz()
    {
        return new static([
            'type' => 'quiz'
        ]);
    }

    public static function regular()
    {
        return new static([
            'type' => 'regular'
        ]);
    }

}