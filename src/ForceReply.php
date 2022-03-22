<?php

namespace PhpTelegramBot\FluentKeyboard;

/**
 * @method self inputFieldPlaceholder(string $input_field_placeholder)
 * @method self selective(bool $selective = true)
 */
class ForceReply extends FluentEntity
{

    protected $data = [
        'force_reply' => true,
    ];

    protected $defaults = [
        'selective' => true,
    ];

}