<?php

use PhpTelegramBot\FluentKeyboard\ReplyKeyboard\KeyboardButton;
use PhpTelegramBot\FluentKeyboard\ReplyKeyboard\ReplyKeyboardMarkup;

it('creates valid JSON', function () {
    $keyboard = ReplyKeyboardMarkup::make();
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'keyboard' => [],
    ]);
});

it('can set known fields', function () {
    $keyboard = ReplyKeyboardMarkup::make()
        ->inputFieldPlaceholder('Placeholder')
        ->oneTimeKeyboard()
        ->resizeKeyboard()
        ->selective();
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'keyboard'                => [],
        'input_field_placeholder' => 'Placeholder',
        'one_time_keyboard'       => true,
        'resize_keyboard'         => true,
        'selective'               => true,
    ]);
});

it('can set unknown fields', function () {
    $keyboard = ReplyKeyboardMarkup::make()
        ->unknownField('Test');
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'keyboard'      => [],
        'unknown_field' => 'Test'
    ]);
});

it('can have multiple buttons', function () {
    $keyboard = ReplyKeyboardMarkup::make()
        ->button(KeyboardButton::make()->text('Button A'))
        ->button(KeyboardButton::make()->text('Button B'))
        ->row()
        ->button(KeyboardButton::make()->text('Button C'))
        ->button(KeyboardButton::make()->text('Button D'));
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'keyboard' => [
            [
                ['text' => 'Button A'],
                ['text' => 'Button B'],
            ], [
                ['text' => 'Button C'],
                ['text' => 'Button D'],
            ]
        ]
    ]);
});

it('can have multiple rows', function () {
    $keyboard = ReplyKeyboardMarkup::make()
        ->row([
            KeyboardButton::make()->text('Button A'),
            KeyboardButton::make()->text('Button B')
        ])->row([
            KeyboardButton::make()->text('Button C'),
            KeyboardButton::make()->text('Button D')
        ]);
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'keyboard' => [
            [
                ['text' => 'Button A'],
                ['text' => 'Button B'],
            ], [
                ['text' => 'Button C'],
                ['text' => 'Button D'],
            ],
        ]
    ]);
});