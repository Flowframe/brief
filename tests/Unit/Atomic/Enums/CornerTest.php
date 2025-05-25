<?php

declare(strict_types=1);

use Flowframe\Brief\Atomic\Enums\Corner;

test('it can display long formats', function (string $corner, string $expected) {
    expect(Corner::from($corner)->long())->toBe($expected);
})->with([
    ['tr', 'top-right'],
    ['br', 'bottom-right'],
    ['bl', 'bottom-left'],
    ['tl', 'top-left'],
]);
