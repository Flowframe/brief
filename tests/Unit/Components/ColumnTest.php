<?php

declare(strict_types=1);

use Flowframe\Brief\Components\Column;
use Flowframe\Brief\ValueObjects\Styles;

test('it can be created', function () {
    $column = Column::make('Foo');

    expect($column)->toBeInstanceOf(Column::class);
});

test('it can have children', function () {
    $children = ['Foo'];

    $column = Column::make(...$children);

    expect($column->getChildren())->toEqual($children);
});

test('it can be styled', function () {
    $styles = new Styles([
        'color' => 'red',
    ]);

    $column = Column::make('Foo')->style($styles);

    expect($column->getStyles())->toEqual($styles);
});

test('it can render', function () {
    $styles = Styles::make([
        'color' => 'red',
    ]);

    $column = Column::make('Foo')->style($styles);

    expect($column->render('Bar'))->toMatchSnapshot();
});
