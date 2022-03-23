<?php

use PhpTelegramBot\FluentKeyboard\ReplyKeyboardRemove;

it('creates valid JSON', function () {
    $keyboard = ReplyKeyboardRemove::make();
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'remove_keyboard' => true
    ]);
});

it('can set known fields', function () {
    $keyboard = ReplyKeyboardRemove::make()
        ->selective();
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'remove_keyboard' => true,
        'selective'       => true,
    ]);
});

it('can set unknown fields', function () {
    $keyboard = ReplyKeyboardRemove::make()
        ->unknownFields('unknown');
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'remove_keyboard' => true,
        'unknown_fields'  => 'unknown'
    ]);
});