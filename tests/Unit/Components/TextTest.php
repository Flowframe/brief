<?php

declare(strict_types=1);

use Flowframe\Brief\Components\Text;
use Flowframe\Brief\ValueObjects\Styles;

test('it can be created', function () {
    $text = Text::make('Foo');

    expect($text)->toBeInstanceOf(Text::class);
});

test('it can have children', function () {
    $children = ['Foo'];

    $text = Text::make(...$children);

    expect($text->getChildren())->toEqual($children);
});

test('it can be styled', function () {
    $styles = new Styles([
        'color' => 'red',
    ]);

    $text = Text::make('Foo')->style($styles);

    expect($text->getStyles())->toEqual($styles);
});

test('it can render', function () {
    $text = Text::make('Foo')->style(new Styles([
        'color' => 'red',
    ]));

    expect($text->render('Bar'))->toMatchSnapshot();
});
