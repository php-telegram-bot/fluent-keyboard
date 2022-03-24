<?php

namespace PhpTelegramBot\FluentKeyboard;

abstract class FluentEntity implements \JsonSerializable
{

    protected array $data = [];

    protected array $defaults = [];

    public function __construct(array $data = [])
    {
        $this->data = $data + $this->data;
    }

    public static function make(): static
    {
        return new static;
    }

    public function __call($name, $arguments): self
    {
        $key = snake_case($name);

        $this->data[$key] = $arguments[0] ?? $this->getDefault($key);

        return $this;
    }

    public function jsonSerialize(): object
    {
        return (object) $this->data;
    }

    private function getDefault($key): mixed
    {
        return $this->defaults[$key] ?? null;
    }

}