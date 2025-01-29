<?php

declare(strict_types=1);

use Flowframe\Brief\Components\Font;

test('it can be created', function () {
    $font = Font::make('Roboto', 400, 'https://example.com');

    expect($font)->toBeInstanceOf(Font::class);
});

test('it can have a format', function () {
    $font = Font::make('Roboto', 400, 'https://example.com')->format('ttf');

    expect($font->render())->toContain('format("ttf")');
});

test('it can render', function () {
    $font = Font::make('Roboto', 400, 'https://example.com');

    expect($font->render())->toMatchSnapshot();
});
