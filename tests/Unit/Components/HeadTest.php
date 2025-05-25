<?php

declare(strict_types=1);

use Flowframe\Brief\Components\Head;

test('it can be created', function () {
    $head = Head::make('Foo');

    expect($head)->toBeInstanceOf(Head::class);
});

test('it can have children', function () {
    $children = ['Foo'];

    $head = Head::make(...$children);

    expect($head->getChildren())->toEqual($children);
});

test('it can render', function () {
    $head = Head::make('Foo');

    expect($head->render('Bar'))->toMatchSnapshot();
});
