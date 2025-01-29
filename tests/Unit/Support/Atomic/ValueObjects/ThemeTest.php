<?php

declare(strict_types=1);

use Flowframe\Brief\Support\Atomic\ValueObjects\Theme;

test('it can be created', function () {
    $value = [
        'colors' => [
            'black' => '#000',
        ],
    ];

    $theme = Theme::make($value);

    expect($theme)->toBeInstanceOf(Theme::class);
    expect($theme->toArray())->toEqual($value);
});

test('it can be merged', function () {
    $theme = new Theme([
        'colors' => [
            'black' => '#000',
            'gray' => [
                '50' => '#f9f9f9',
            ],
        ],
    ]);

    $theme = $theme->merge(new Theme([
        'colors' => [
            'white' => '#fff',
            'gray' => [
                '50' => '#f8f8f8',
                '100' => '#f5f5f5',
            ],
        ],
    ]));

    expect($theme->toArray())->toEqual([
        'colors' => [
            'black' => '#000',
            'white' => '#fff',
            'gray' => [
                '50' => '#f8f8f8',
                '100' => '#f5f5f5',
            ],
        ],
    ]);
});

test('it can get properties', function () {
    $theme = new Theme([
        'colors' => [
            'black' => '#000',
            'gray' => [
                '50' => '#f9f9f9',
            ],
        ],
    ]);

    expect($theme->get('colors.black'))->toEqual('#000');
    expect($theme->get('colors.gray.50'))->toEqual('#f9f9f9');
});
