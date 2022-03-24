<?php

namespace PhpTelegramBot\FluentKeyboard;

/**
 * @method self inputFieldPlaceholder(string $input_field_placeholder)
 * @method self selective(bool $selective = true)
 */
class ForceReply extends FluentEntity
{

    protected array $data = [
        'force_reply' => true,
    ];

    protected array $defaults = [
        'selective' => true,
    ];

}