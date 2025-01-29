<?php

declare(strict_types=1);

use Flowframe\Brief\Components\Section;
use Flowframe\Brief\ValueObjects\Styles;

test('it can be created', function () {
    $section = Section::make('Foo');

    expect($section)->toBeInstanceOf(Section::class);
});

test('it can have children', function () {
    $children = ['Foo'];

    $section = Section::make(...$children);

    expect($section->getChildren())->toEqual($children);
});

test('it can be styled', function () {
    $styles = new Styles([
        'color' => 'red',
    ]);

    $section = Section::make('Foo')->style($styles);

    expect($section->getStyles())->toEqual($styles);
});

test('it can render', function () {
    $styles = Styles::make([
        'color' => 'red',
    ]);

    $section = Section::make('Foo')->style($styles);

    expect($section->render('Bar'))->toMatchSnapshot();
});
