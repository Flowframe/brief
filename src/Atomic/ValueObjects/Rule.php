<?php

declare(strict_types=1);

namespace Flowframe\Brief\Atomic\ValueObjects;

use Closure;
use Flowframe\Brief\ValueObjects\Styles;

final readonly class Rule
{
    public function __construct(
        public string $pattern,
        public Closure|Styles $styles,
    ) {}
}
