<?php

namespace PhpTelegramBot\FluentKeyboard\ReplyKeyboard;

use PhpTelegramBot\FluentKeyboard\FluentEntity;

/**
 * @method self resizeKeyboard(bool $resize_keyboard = true)
 * @method self oneTimeKeyboard(bool $one_time_keyboard = true)
 * @method self inputFieldPlaceholder(string $input_field_placeholder)
 * @method self selective(bool $selective = true)
 */
class ReplyKeyboardMarkup extends FluentEntity
{

    protected $data = [
        'keyboard' => [],
    ];

    protected $defaults = [
        'resize_keyboard'   => true,
        'one_time_keyboard' => true,
        'selective'         => true,
    ];

    /**
     * Adds a row to the keyboard
     * @param  array  $row
     * @return $this
     */
    public function row(array $row = [])
    {
        $this->data['keyboard'][] = $row;

        return $this;
    }

    public function button(KeyboardButton $button)
    {
        $count = count($this->data['keyboard']);
        if ($count === 0) {
            $this->data['keyboard'][] = [];
            $count++;
        }

        $this->data['keyboard'][$count - 1][] = $button;

        return $this;
    }

}
