<?php

namespace PhpTelegramBot\FluentKeyboard;

abstract class FluentEntity implements \JsonSerializable
{
    /**
     * @var array $data
     */
    protected $data = [];

    protected $defaults = [];

    public static function make()
    {
        return new static;
    }

    public function __call($name, $arguments)
    {
        $key = snake_case($name);

        $this->data[$key] = $arguments[0] ?? $this->getDefault($key);

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->data;
    }

    private function getDefault($key)
    {
        return $this->defaults[$key] ?? null;
    }

}