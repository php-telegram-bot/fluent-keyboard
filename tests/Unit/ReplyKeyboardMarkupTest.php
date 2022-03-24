<?php

use PhpTelegramBot\FluentKeyboard\ReplyKeyboard\KeyboardButton;
use PhpTelegramBot\FluentKeyboard\ReplyKeyboard\ReplyKeyboardMarkup;

it('creates valid JSON', function () {
    $keyboard = ReplyKeyboardMarkup::make();

    expect($keyboard)->toMatchEntity([
        'keyboard' => [[]],
    ]);
});

it('can set known fields', function () {
    $keyboard = ReplyKeyboardMarkup::make()
        ->inputFieldPlaceholder('Placeholder')
        ->oneTimeKeyboard()
        ->resizeKeyboard()
        ->selective();

    expect($keyboard)->toMatchEntity([
        'keyboard'                => [[]],
        'input_field_placeholder' => 'Placeholder',
        'one_time_keyboard'       => true,
        'resize_keyboard'         => true,
        'selective'               => true,
    ]);
});

it('can set unknown fields', function () {
    $keyboard = ReplyKeyboardMarkup::make()
        ->unknownField('Test');

    expect($keyboard)->toMatchEntity([
        'keyboard'      => [[]],
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

    expect($keyboard)->toMatchEntity([
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

    expect($keyboard)->toMatchEntity([
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

it('can have multiple stacks', function () {
    $keyboard = ReplyKeyboardMarkup::make()
        ->stack([
            KeyboardButton::make()->text('Button A'),
            KeyboardButton::make()->text('Button B'),
        ])
        ->stack([
            KeyboardButton::make()->text('Button C'),
            KeyboardButton::make()->text('Button D'),
        ]);

    expect($keyboard)->toMatchEntity([
        'keyboard' => [
            [
                ['text' => 'Button A'],
            ],
            [
                ['text' => 'Button B'],
            ],
            [
                ['text' => 'Button C'],
            ],
            [
                ['text' => 'Button D'],
            ],
        ]
    ]);
});

it('can mix rows, stacks and buttons', function () {
    $keyboard = ReplyKeyboardMarkup::make()
        ->button(KeyboardButton::make()->text('Button A'))
        ->button(KeyboardButton::make()->text('Button B'))
        ->row([
            KeyboardButton::make()->text('Button C'),
            KeyboardButton::make()->text('Button D')
        ])
        ->button(KeyboardButton::make()->text('Button E'))
        ->button(KeyboardButton::make()->text('Button F'))
        ->stack([
            KeyboardButton::make()->text('Button G'),
            KeyboardButton::make()->text('Button H')
        ])
        ->button(KeyboardButton::make()->text('Button I'))
        ->button(KeyboardButton::make()->text('Button J'));

    expect($keyboard)->toMatchEntity([
        'keyboard' => [
            [
                ['text' => 'Button A'],
                ['text' => 'Button B'],
            ],
            [
                ['text' => 'Button C'],
                ['text' => 'Button D'],
            ],
            [
                ['text' => 'Button E'],
                ['text' => 'Button F'],
            ],
            [
                ['text' => 'Button G'],
            ], [
                ['text' => 'Button H'],
            ],
            [
                ['text' => 'Button I'],
                ['text' => 'Button J'],
            ],
        ]
    ]);
});