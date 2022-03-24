<?php

namespace PhpTelegramBot\FluentKeyboard;

abstract class FluentEntity implements \JsonSerializable
{
    /**
     * @var array $data
     */
    protected $data = [];

    protected $defaults = [];

    public function __construct(array $data = [])
    {
        $this->data = $data + $this->data;
    }

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

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return (object) $this->data;
    }

    private function getDefault($key)
    {
        return $this->defaults[$key] ?? null;
    }

}