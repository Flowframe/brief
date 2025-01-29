<?php

declare(strict_types=1);

use Flowframe\Brief\Support\Helpers\RecursiveObjectMerger;

test('it can merge objects', function () {
    $a = (object) [
        'colors' => (object) [
            'red' => (object) [
                400 => '#400',
                500 => '#500',
                600 => '#600',
            ],
        ],
    ];

    $b = (object) [
        'colors' => (object) [
            'blue' => '#blue',
            'red' => (object) [
                300 => '#300',
                400 => '#400u',
                // 500 => '#500',
                600 => '#600u',
                700 => '#700',
                1 => '#1',
            ],
        ],
    ];
    $merger = new RecursiveObjectMerger;

    $output = $merger->merge($a, $b);

    expect($output)->toEqual((object) [
        'colors' => (object) [
            'blue' => '#blue',
            'red' => (object) [
                300 => '#300',
                400 => '#400u',
                500 => '#500',
                600 => '#600u',
                700 => '#700',
                1 => '#1',
            ],
        ],
    ]);
});
