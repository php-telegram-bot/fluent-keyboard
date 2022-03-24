<?php

use PhpTelegramBot\FluentKeyboard\InlineKeyboard\InlineKeyboardButton;
use PhpTelegramBot\FluentKeyboard\InlineKeyboard\InlineKeyboardMarkup;

it('creates valid JSON', function () {
    $keyboard = InlineKeyboardMarkup::make();

    expect($keyboard)->toMatchEntity([
        'inline_keyboard' => [[]]
    ]);
});

it('can set unknown fields', function () {
    $keyboard = InlineKeyboardMarkup::make()
        ->unknownField('unknown');

    expect($keyboard)->toMatchEntity([
        'unknown_field' => 'unknown',
    ]);
});

it('can have multiple buttons', function () {
    $keyboard = InlineKeyboardMarkup::make()
        ->button(InlineKeyboardButton::make()->text('Button A'))
        ->button(InlineKeyboardButton::make()->text('Button B'))
        ->row()
        ->button(InlineKeyboardButton::make()->text('Button C'))
        ->button(InlineKeyboardButton::make()->text('Button D'));

    expect($keyboard)->toMatchEntity([
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

it('can have multiple rows', function () {
    $keyboard = InlineKeyboardMarkup::make()
        ->row([
            InlineKeyboardButton::make()->text('Button A'),
            InlineKeyboardButton::make()->text('Button B'),
        ])->row([
            InlineKeyboardButton::make()->text('Button C'),
            InlineKeyboardButton::make()->text('Button D'),
        ]);

    expect($keyboard)->toMatchEntity([
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

it('can have multiple stacks', function () {
    $keyboard = InlineKeyboardMarkup::make()
        ->stack([
            InlineKeyboardButton::make()->text('Button A'),
            InlineKeyboardButton::make()->text('Button B'),
        ])
        ->stack([
            InlineKeyboardButton::make()->text('Button C'),
            InlineKeyboardButton::make()->text('Button D'),
        ]);

    expect($keyboard)->toMatchEntity([
        'inline_keyboard' => [
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
    $keyboard = InlineKeyboardMarkup::make()
        ->button(InlineKeyboardButton::make()->text('Button A'))
        ->button(InlineKeyboardButton::make()->text('Button B'))
        ->row([
            InlineKeyboardButton::make()->text('Button C'),
            InlineKeyboardButton::make()->text('Button D')
        ])
        ->button(InlineKeyboardButton::make()->text('Button E'))
        ->button(InlineKeyboardButton::make()->text('Button F'))
        ->stack([
            InlineKeyboardButton::make()->text('Button G'),
            InlineKeyboardButton::make()->text('Button H')
        ])
        ->button(InlineKeyboardButton::make()->text('Button I'))
        ->button(InlineKeyboardButton::make()->text('Button J'));

    expect($keyboard)->toMatchEntity([
        'inline_keyboard' => [
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