<?php

use PhpTelegramBot\FluentKeyboard\ReplyKeyboard\KeyboardButtonPollType;

it('creates any type', function () {
    $button = KeyboardButtonPollType::any();
    $json = json_encode($button);

    expect($json)->json()->toMatchArray([]);
});

it('creates quiz type', function () {
    $button = KeyboardButtonPollType::quiz();
    $json = json_encode($button);

    expect($json)->json()->toMatchArray([
        'type' => 'quiz'
    ]);
});

it('creates regular type', function () {
    $button = KeyboardButtonPollType::regular();
    $json = json_encode($button);

    expect($json)->json()->toMatchArray([
        'type' => 'regular'
    ]);
});

it('creates unknown type', function () {
    $button = new KeyboardButtonPollType([
        'type' => 'unknown',
    ]);
    $json = json_encode($button);

    expect($json)->json()->toMatchArray([
        'type' => 'unknown',
    ]);
});
