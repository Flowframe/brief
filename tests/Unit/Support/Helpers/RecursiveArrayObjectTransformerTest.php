<?php

declare(strict_types=1);

use Flowframe\Brief\Support\Helpers\RecursiveArrayObjectTransformer;

test('it can transform to objects', function () {
    $transformer = new RecursiveArrayObjectTransformer;

    $data = [
        'colors' => [
            'blue' => '#blue',
            'red' => [
                400 => '#400',
                500 => '#500',
                600 => '#600',
            ],
        ],
    ];

    expect($transformer->toObject($data))->toEqual(
        (object) [
            'colors' => (object) [
                'blue' => '#blue',
                'red' => (object) [
                    400 => '#400',
                    500 => '#500',
                    600 => '#600',
                ],
            ],
        ]
    );
});

test('it can transform to arrays', function () {
    $transformer = new RecursiveArrayObjectTransformer;

    $data = (object) [
        'colors' => (object) [
            'blue' => '#blue',
            'red' => (object) [
                400 => '#400',
                500 => '#500',
                600 => '#600',
            ],
        ],
    ];

    expect($transformer->toArray($data))->toEqual(
        [
            'colors' => [
                'blue' => '#blue',
                'red' => [
                    400 => '#400',
                    500 => '#500',
                    600 => '#600',
                ],
            ],
        ]
    );
});
