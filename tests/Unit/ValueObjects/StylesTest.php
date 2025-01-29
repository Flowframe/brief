<?php

declare(strict_types=1);

use Flowframe\Brief\ValueObjects\Styles;

test('it can be created', function () {
    $styles = Styles::make([]);

    expect($styles)->toBeInstanceOf(Styles::class);
});

test('it can merge styles', function () {
    $styles = new Styles([
        'padding' => '1rem',
        'background' => 'hotpink',
    ]);

    $styles = $styles->merge(new Styles([
        'padding' => '2rem',
        'font-size' => '1rem',
    ]));

    expect($styles)->toEqual(new Styles([
        'padding' => '2rem',
        'background' => 'hotpink',
        'font-size' => '1rem',
    ]));
});

test('it can return inline styles', function () {
    $styles = Styles::make([
        'padding' => '2rem',
        'background' => 'hotpink',
        'font-size' => '1rem',
    ]);

    expect($styles->inline())->toEqual('padding:2rem;background:hotpink;font-size:1rem');
});

test('it can get style values', function () {
    $styles = Styles::make([
        'padding' => '2rem',
        'background' => 'hotpink',
        'font-size' => '1rem',
    ]);

    expect($styles->get('padding'))->toEqual('2rem');
});

test('it can find styles', function () {
    $styles = Styles::make([
        'padding' => '2rem',
        'background' => 'hotpink',
        'font-size' => '1rem',
    ]);

    expect($styles->find('padding'))->toEqual(Styles::make([
        'padding' => '2rem',
    ]));
});

test('it returns empty styles if not found', function () {
    $styles = Styles::make([
        'padding' => '2rem',
        'background' => 'hotpink',
        'font-size' => '1rem',
    ]);

    expect($styles->find('margin'))->toEqual(Styles::make([]));
});
