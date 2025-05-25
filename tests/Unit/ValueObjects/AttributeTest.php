<?php

declare(strict_types=1);

use Flowframe\Brief\ValueObjects\Attributes;
use Flowframe\Brief\ValueObjects\Styles;

test('it can be created', function () {
    $attributes = Attributes::make([
        'width' => '200',
        'height' => '100',
    ]);

    expect($attributes)->toBeInstanceOf(Attributes::class);
});

test('it can get filled attributes', function () {
    $attributes = Attributes::make([
        'style' => Styles::make([]),
        'width' => '200',
        'height' => '100',
        'src' => '',
    ]);

    expect($attributes->getFilledAttributes())->toEqual([
        'width' => '200',
        'height' => '100',
    ]);
});
