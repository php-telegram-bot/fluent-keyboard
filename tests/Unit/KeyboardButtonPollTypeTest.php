<?php

use PhpTelegramBot\FluentKeyboard\ReplyKeyboard\KeyboardButtonPollType;

it('creates any type', function () {
    $button = KeyboardButtonPollType::any();

    expect($button)->toMatchEntity([]);
});

it('creates quiz type', function () {
    $button = KeyboardButtonPollType::quiz();

    expect($button)->toMatchEntity([
        'type' => 'quiz'
    ]);
});

it('creates regular type', function () {
    $button = KeyboardButtonPollType::regular();

    expect($button)->toMatchEntity([
        'type' => 'regular'
    ]);
});

it('creates unknown type', function () {
    $button = new KeyboardButtonPollType([
        'type' => 'unknown',
    ]);

    expect($button)->toMatchEntity([
        'type' => 'unknown',
    ]);
});
