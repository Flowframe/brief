<?php

declare(strict_types=1);

use Flowframe\Brief\Components\Preview;

test('it can be created', function () {
    $preview = Preview::make('Foo');

    expect($preview)->toBeInstanceOf(Preview::class);
});

test('it can format text', function () {
    $preview = Preview::make('Foo');

    expect($preview->getText())->toStartWith('Foo');
});

test('it does not format text if its past the limit', function () {
    $text = str_repeat('a', 150);

    $preview = Preview::make($text);

    expect($preview->getText())->toEqual($text);
});

test('it can render', function () {
    $preview = Preview::make('Foo');

    expect($preview->render())->toMatchSnapshot();
});
