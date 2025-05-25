<?php

declare(strict_types=1);

use Flowframe\Brief\Atomic\Atomic;
use Flowframe\Brief\Atomic\Presets\DefaultPreset;
use Flowframe\Brief\Atomic\ValueObjects\Rule;
use Flowframe\Brief\ValueObjects\Styles;

test('it can be created', function () {
    $preset = new DefaultPreset;

    $atomic = Atomic::make([$preset]);

    expect($atomic)->toBeInstanceOf(Atomic::class);
    expect($atomic->getRules())->toEqual($preset->getRules());
    expect($atomic->getTheme())->toEqual($preset->getTheme());
});

test('it can parse', function () {
    $preset = new DefaultPreset;

    $atomic = Atomic::make([$preset]);

    expect($atomic('bg-gray-50 text-gray-600 font-medium text-xl'))->toEqual(new Styles([
        'background-color' => '#f9fafb',
        'color' => '#4b5154',
        'font-weight' => '500',
        'font-size' => '20px',
        'line-height' => '28px',
    ]));
});

test('it can parse rules with static styles', function () {
    $atomic = Atomic::make()->extendRules([
        new Rule('/^background-hotpink$/', new Styles([
            'background-color' => 'hotpink',
        ])),
    ]);

    expect($atomic('background-hotpink'))->toEqual(new Styles([
        'background-color' => 'hotpink',
    ]));
});
