<?php

use PhpTelegramBot\FluentKeyboard\InlineKeyboard\InlineKeyboardButton;

it('creates valid JSON', function () {
    $button = InlineKeyboardButton::make();
    $json = json_encode($button);

    expect($json)->json()->toMatchArray([

    ]);
});

it('can set known fields', function () {
    $button = InlineKeyboardButton::make()
        ->text('Text')
        ->url('http://example.com')
        ->loginUrl([])
        ->callbackData('Callback Data')
        ->switchInlineQuery('Switch Inline Query')
        ->switchInlineQueryCurrentChat('Switch Inline Query Current Chat')
        ->callbackGame('Callback Game')
        ->pay();
    $json = json_encode($button);

    expect($json)->json()->toMatchArray([
        'text'                             => 'Text',
        'url'                              => 'http://example.com',
        'login_url'                        => [],
        'callback_data'                    => 'Callback Data',
        'switch_inline_query'              => 'Switch Inline Query',
        'switch_inline_query_current_chat' => 'Switch Inline Query Current Chat',
        'callback_game'                    => 'Callback Game',
        'pay'                              => true,
    ]);
});

it('can set text via make', function () {
    $button = InlineKeyboardButton::make('Test');
    $json = json_encode($button);

    expect($json)->json()->toMatchArray([
        'text' => 'Test',
    ]);
});

it('can set unknown fields', function () {
    $button = InlineKeyboardButton::make()
        ->unknownField('unknown');
    $json = json_encode($button);

    expect($json)->json()->toMatchArray([
        'unknown_field' => 'unknown',
    ]);
});