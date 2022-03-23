<?php

use PhpTelegramBot\FluentKeyboard\ReplyKeyboard\KeyboardButton;

it('creates valid JSON', function () {
    $keyboard = KeyboardButton::make();
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([]);
});

it('can set known fields', function () {
    $keyboard = KeyboardButton::make()
        ->text('Text')
        ->requestContact()
        ->requestLocation()
        ->requestPoll();
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'text'             => 'Text',
        'request_contact'  => true,
        'request_location' => true,
        'request_poll'     => []
    ]);
});

it('can set text via make', function () {
    $button = KeyboardButton::make('Text');
    $json = json_encode($button);

    expect($json)->json()->toMatchArray([
        'text' => 'Text',
    ]);
});

it('can set unknown fields', function () {
    $keyboard = KeyboardButton::make()
        ->unknownField('Test');
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'unknown_field' => 'Test',
    ]);
});