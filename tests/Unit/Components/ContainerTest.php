<?php

declare(strict_types=1);

use Flowframe\Brief\Components\Container;
use Flowframe\Brief\ValueObjects\Styles;

test('it can be created', function () {
    $container = Container::make('Foo');

    expect($container)->toBeInstanceOf(Container::class);
});

test('it can have children', function () {
    $children = ['Foo'];

    $container = Container::make(...$children);

    expect($container->getChildren())->toEqual($children);
});

test('it can be styled', function () {
    $styles = new Styles([
        'color' => 'red',
    ]);

    $container = Container::make('Foo')->style($styles);

    expect($container->getStyles())->toEqual($styles);
});

test('it can render', function () {
    $styles = Styles::make([
        'color' => 'red',
    ]);

    $container = Container::make('Foo')->style($styles);

    expect($container->render('Bar'))->toMatchSnapshot();
});
