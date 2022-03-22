<?php

namespace PhpTelegramBot\FluentKeyboard\InlineKeyboard;

use PhpTelegramBot\FluentKeyboard\FluentEntity;

/**
 * @method self text(string $text)
 * @method self url(string $url)
 * @method self loginUrl(array $login_url)
 * @method self callbackData(string $callback_data)
 * @method self switchInlineQuery(string $switch_inline_query)
 * @method self switchInlineQueryCurrentChat(string $switch_inline_query_current_chat)
 * @method self callbackGame(string $callback_game)
 * @method self pay(bool $pay = true)
 */
class InlineKeyboardButton extends FluentEntity
{

    protected $defaults = [
        'pay' => true,
    ];

}