<?php

declare(strict_types=1);

use Flowframe\Brief\Components\Row;

test('it can be created', function () {
    $row = Row::make('Foo');

    expect($row)->toBeInstanceOf(Row::class);
});

test('it can have children', function () {
    $children = ['Foo'];

    $row = Row::make(...$children);

    expect($row->getChildren())->toEqual($children);
});

test('it can render', function () {
    $row = Row::make('Foo');

    expect($row->render('Bar'))->toMatchSnapshot();
});
