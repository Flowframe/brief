<?php

declare(strict_types=1);

namespace Flowframe\Brief\Components\Contracts;

use Flowframe\Brief\ValueObjects\Styles;

interface StylesInterface
{
    /**
     * Style the component.
     */
    public function style(Styles $styles): static;

    /**
     * Get the component styles.
     */
    public function getStyles(): Styles;
}
