<?php

declare(strict_types=1);

use Flowframe\Brief\Components\Img;
use Flowframe\Brief\ValueObjects\Styles;

test('it can be created', function () {
    $img = Img::make('Foo');

    expect($img)->toBeInstanceOf(Img::class);
});

test('it can be styled', function () {
    $styles = new Styles([
        'color' => 'red',
    ]);

    $img = Img::make('Foo')->style($styles);

    expect($img->getStyles())->toEqual($styles);
});

test('it can be sized', function () {
    $img = Img::make('Foo')
        ->size(100);

    expect($img->render())->toContain('width="100"', 'height="100"');
});

test('it can have a sizes', function () {
    $img = Img::make('Foo')
        ->width(200)
        ->height(100);

    expect($img->render())->toContain('width="200"', 'height="100"');
});

test('it can inherit sizes from styles', function () {
    $img = Img::make('Foo')
        ->style(Styles::make([
            'width' => '400px',
            'height' => '200px',
        ]));

    expect($img->render())->toContain('width="400"', 'height="200"');
});

test('it can render', function () {
    $styles = Styles::make([
        'color' => 'red',
    ]);

    $img = Img::make('https://example.com', 'picture')->style($styles);

    expect($img->render())->toMatchSnapshot();
});
