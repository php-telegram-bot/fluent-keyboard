<?php

namespace PhpTelegramBot\FluentKeyboard\InlineKeyboard;

use PhpTelegramBot\FluentKeyboard\FluentEntity;

class InlineKeyboardMarkup extends FluentEntity
{

    protected $data = [
        'inline_keyboard' => []
    ];

    /**
     * Adds a row to the keyboard
     * @param  array  $row
     * @return $this
     */
    public function row(array $row = [])
    {
        $this->data['inline_keyboard'][] = $row;

        return $this;
    }

    public function button(InlineKeyboardButton $button)
    {
        $count = count($this->data['inline_keyboard']);
        if (count($this->data['inline_keyboard']) === 0) {
            $this->data['inline_keyboard'][] = [];
            $count++;
        }

        $this->data['inline_keyboard'][$count - 1][] = $button;

        return $this;
    }

}