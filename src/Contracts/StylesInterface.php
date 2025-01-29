<?php

declare(strict_types=1);

namespace Flowframe\Brief\Contracts;

use Flowframe\Brief\ValueObjects\Styles;

interface StylesInterface
{
    public function style(Styles $styles): static;

    public function getStyles(): Styles;
}
