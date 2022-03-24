<?php

namespace PhpTelegramBot\FluentKeyboard\InlineKeyboard;

use PhpTelegramBot\FluentKeyboard\Button;

/**
 * @method self text(string $text)
 * @method self url(string $url)
 * @method self callbackData(string $callback_data)
 * @method self switchInlineQuery(string $switch_inline_query)
 * @method self switchInlineQueryCurrentChat(string $switch_inline_query_current_chat)
 * @method self callbackGame(string $callback_game)
 * @method self pay(bool $pay = true)
 */
class InlineKeyboardButton extends Button
{

    protected array $defaults = [
        'pay' => true,
    ];

    public static function make(string $text = null): static
    {
        $data = [];

	    if ($text !== null) {
            $data['text'] = $text;
        }

        return new static($data);
    }

    public function loginUrl(array|string $login_url): self
    {
        if (is_string($login_url)) {
            $login_url = [
                'url' => $login_url
            ];
        }

        $this->data['login_url'] = $login_url;

        return $this;
    }

}