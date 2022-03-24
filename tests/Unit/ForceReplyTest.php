<?php

use PhpTelegramBot\FluentKeyboard\ForceReply;

it('creates valid JSON', function () {
    $keyboard = ForceReply::make();

    expect($keyboard)->toMatchEntity([
        'force_reply' => true,
    ]);
});

it('can set known fields', function () {
    $keyboard = ForceReply::make()
        ->selective();

    expect($keyboard)->toMatchEntity([
        'force_reply' => true,
        'selective'   => true,
    ]);
});

it('can set unknown fields', function () {
    $keyboard = ForceReply::make()
        ->unknownFields('unknown');

    expect($keyboard)->toMatchEntity([
        'force_reply'    => true,
        'unknown_fields' => 'unknown'
    ]);
});