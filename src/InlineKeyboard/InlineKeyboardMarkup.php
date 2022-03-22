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

}