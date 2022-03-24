<?php

use PhpTelegramBot\FluentKeyboard\ReplyKeyboard\KeyboardButton;

it('creates valid JSON', function () {
    $button = KeyboardButton::make();

    expect($button)->toMatchEntity([]);
});

it('can set known fields', function () {
    $button = KeyboardButton::make()
        ->text('Text')
        ->requestContact()
        ->requestLocation()
        ->requestPoll();

    expect($button)->toMatchEntity([
        'text'             => 'Text',
        'request_contact'  => true,
        'request_location' => true,
        'request_poll'     => []
    ]);
});

it('can set text via make', function () {
    $button = KeyboardButton::make('Text');

    expect($button)->toMatchEntity([
        'text' => 'Text',
    ]);
});

it('can set unknown fields', function () {
    $button = KeyboardButton::make()
        ->unknownField('Test');

    expect($button)->toMatchEntity([
        'unknown_field' => 'Test',
    ]);
});