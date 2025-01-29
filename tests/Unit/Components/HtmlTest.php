<?php

declare(strict_types=1);

use Flowframe\Brief\Components\Html;

test('it can be created', function () {
    $html = Html::make('Foo');

    expect($html)->toBeInstanceOf(Html::class);
});

test('it can have children', function () {
    $children = ['Foo'];

    $html = Html::make(...$children);

    expect($html->getChildren())->toEqual($children);
});

test('it can have a language', function () {
    $children = ['Foo'];

    $html = Html::make(...$children)->lang('nl');

    expect($html->render())->toContain('lang="nl"');
});

test('it can render', function () {
    $html = Html::make('Foo');

    expect($html->render('Bar'))->toMatchSnapshot();
});
