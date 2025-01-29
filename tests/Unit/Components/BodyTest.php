<?php

declare(strict_types=1);

use Flowframe\Brief\Components\Body;
use Flowframe\Brief\ValueObjects\Styles;

test('it can be created', function () {
    $body = Body::make('Foo');

    expect($body)->toBeInstanceOf(Body::class);
});

test('it can have children', function () {
    $children = ['Foo'];

    $body = Body::make(...$children);

    expect($body->getChildren())->toEqual($children);
});

test('it can be styled', function () {
    $styles = new Styles([
        'color' => 'red',
    ]);

    $body = Body::make('Foo')->style($styles);

    expect($body->getStyles())->toEqual($styles);
});

test('it can render', function () {
    $styles = Styles::make([
        'color' => 'red',
    ]);

    $body = Body::make('Foo')->style($styles);

    expect($body->render('Bar'))->toMatchSnapshot();
});
