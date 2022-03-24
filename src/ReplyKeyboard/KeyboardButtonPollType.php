<?php

namespace PhpTelegramBot\FluentKeyboard\ReplyKeyboard;

use PhpTelegramBot\FluentKeyboard\Button;

/**
 * @method $this type(string $type)
 */
class KeyboardButtonPollType extends Button
{

    protected array $data = [];

    public static function any(): static
    {
        return new static();
    }

    public static function quiz(): static
    {
        return new static([
            'type' => 'quiz'
        ]);
    }

    public static function regular(): static
    {
        return new static([
            'type' => 'regular'
        ]);
    }

}