<?php

use PhpTelegramBot\FluentKeyboard\ForceReply;

it('creates valid JSON', function () {
    $keyboard = ForceReply::make();
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'force_reply' => true,
    ]);
});

it('can set known fields', function () {
    $keyboard = ForceReply::make()
        ->selective();
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'force_reply' => true,
        'selective'   => true,
    ]);
});

it('can set unknown fields', function () {
    $keyboard = ForceReply::make()
        ->unknownFields('unknown');
    $json = json_encode($keyboard);

    expect($json)->json()->toMatchArray([
        'force_reply'    => true,
        'unknown_fields' => 'unknown'
    ]);
});