<?php

use PhpTelegramBot\FluentKeyboard\InlineKeyboard\InlineKeyboardButton;
use PhpTelegramBot\FluentKeyboard\InlineKeyboard\InlineKeyboardMarkup;

it('creates valid JSON', function () {
    $keyboard = InlineKeyboardMarkup::make();
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'inline_keyboard' => []
    ]);
});

it('can set unknown fields', function () {
    $keyboard = InlineKeyboardMarkup::make()
        ->unknownField('unknown');
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'unknown_field' => 'unknown',
    ]);
});

it('can has multiple buttons', function () {
    $keyboard = InlineKeyboardMarkup::make()
        ->button(InlineKeyboardButton::make()->text('Button A'))
        ->button(InlineKeyboardButton::make()->text('Button B'))
        ->row()
        ->button(InlineKeyboardButton::make()->text('Button C'))
        ->button(InlineKeyboardButton::make()->text('Button D'));
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'inline_keyboard' => [
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

it('can has multiple rows', function () {
    $keyboard = InlineKeyboardMarkup::make()
        ->row([
            InlineKeyboardButton::make()->text('Button A'),
            InlineKeyboardButton::make()->text('Button B'),
        ])->row([
            InlineKeyboardButton::make()->text('Button C'),
            InlineKeyboardButton::make()->text('Button D'),
        ]);
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'inline_keyboard' => [
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