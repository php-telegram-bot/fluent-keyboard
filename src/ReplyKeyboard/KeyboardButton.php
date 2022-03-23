<?php

namespace PhpTelegramBot\FluentKeyboard\ReplyKeyboard;

use PhpTelegramBot\FluentKeyboard\FluentEntity;

/**
 * @method self text(string $text)
 * @method self requestContact(bool $request_contact = true)
 * @method self requestLocation(bool $request_location = true)
 * @method self requestPoll(KeyboardButtonPollType|array $request_poll = [])
 */
class KeyboardButton extends FluentEntity
{
    protected $defaults = [
        'request_contact'  => true,
        'request_location' => true,
        'request_poll'     => [],
    ];

    public static function make(string $text = null)
    {
        $data = [];

        if ($text) {
            $data['text'] = $text;
        }

        return new static($data);
    }
}