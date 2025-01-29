<?php

declare(strict_types=1);

namespace Flowframe\Brief\Concerns;

use Flowframe\Brief\ValueObjects\Styles;

trait HasStyles
{
    private ?Styles $styles = null;

    public function style(Styles $styles): static
    {
        $this->styles = $styles;

        return $this;
    }

    public function getStyles(): Styles
    {
        return $this->styles ?? new Styles([]);
    }
}
