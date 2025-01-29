<?php

declare(strict_types=1);

use Flowframe\Brief\Support\Atomic\Enums\Side;

test('it can display long formats', function (string $corner, string $expected) {
    expect(Side::from($corner)->long())->toBe($expected);
})->with([
    ['t', 'top'],
    ['r', 'right'],
    ['b', 'bottom'],
    ['l', 'left'],
]);
