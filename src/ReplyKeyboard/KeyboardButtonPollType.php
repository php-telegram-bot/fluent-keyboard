<?php

namespace PhpTelegramBot\FluentKeyboard\ReplyKeyboard;

class KeyboardButtonPollType implements \JsonSerializable
{

    protected $data = [];

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

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

    public function jsonSerialize()
    {
        return $this->data;
    }

}