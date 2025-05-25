<?php

declare(strict_types=1);

use Flowframe\Brief\Components\Hr;
use Flowframe\Brief\ValueObjects\Styles;

test('it can be created', function () {
    $hr = Hr::make();

    expect($hr)->toBeInstanceOf(Hr::class);
});

test('it can be styled', function () {
    $styles = new Styles([
        'color' => 'red',
    ]);

    $hr = Hr::make()->style($styles);

    expect($hr->getStyles())->toEqual($styles);
});

test('it can render', function () {
    $hr = Hr::make('Foo')->style(new Styles([
        'color' => 'red',
    ]));

    expect($hr->render())->toMatchSnapshot();
});
