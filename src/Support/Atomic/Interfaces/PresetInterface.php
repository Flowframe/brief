<?php

declare(strict_types=1);

namespace Flowframe\Brief\Support\Atomic\Interfaces;

use Flowframe\Brief\Support\Atomic\ValueObjects\Rule;
use Flowframe\Brief\Support\Atomic\ValueObjects\Theme;

interface PresetInterface
{
    /**
     * Get the rules that should be applied.
     *
     * @return Rule[]
     */
    public function getRules(): array;

    /**
     * Get the theme that should be merged.
     */
    public function getTheme(): Theme;
}
