<?php

namespace PhpTelegramBot\FluentKeyboard;

if (! function_exists('snake_case')) {
    function snake_case($value)
    {
        return strtolower(preg_replace('/(.)(?=[A-Z])/u', '$1_', $value));
    }
}