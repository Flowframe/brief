<?php

declare(strict_types=1);

use Flowframe\Brief\Components\Button;
use Flowframe\Brief\ValueObjects\Styles;

test('it can be created', function () {
    $button = Button::make('Foo');

    expect($button)->toBeInstanceOf(Button::class);
});

test('it can have children', function () {
    $children = ['Foo'];

    $button = Button::make(...$children);

    expect($button->getChildren())->toEqual($children);
});

test('it can be styled', function () {
    $styles = new Styles([
        'color' => 'red',
    ]);

    $button = Button::make('Foo')->style($styles);

    expect($button->getStyles())->toEqual($styles);
});

test('it can render', function () {
    $styles = Styles::make([
        'color' => 'red',
    ]);

    $button = Button::make('Foo')->style($styles);

    expect($button->render('Bar'))->toMatchSnapshot();
});
