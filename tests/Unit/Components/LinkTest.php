<?php

declare(strict_types=1);

use Flowframe\Brief\Components\Link;
use Flowframe\Brief\ValueObjects\Styles;

test('it can be created', function () {
    $link = Link::make('Foo');

    expect($link)->toBeInstanceOf(Link::class);
});

test('it can have children', function () {
    $children = ['Foo'];

    $link = Link::make(...$children);

    expect($link->getChildren())->toEqual($children);
});

test('it can be styled', function () {
    $styles = new Styles([
        'color' => 'red',
    ]);

    $link = Link::make('Foo')->style($styles);

    expect($link->getStyles())->toEqual($styles);
});

test('it can render', function () {
    $styles = Styles::make([
        'color' => 'red',
    ]);

    $link = Link::make('Foo')
        ->href('https://example.com')
        ->target('_blank')
        ->style($styles);

    expect($link->render('Bar'))->toMatchSnapshot();
});
