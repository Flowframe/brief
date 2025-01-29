<?php

declare(strict_types=1);

namespace Flowframe\Brief\Concerns;

trait HasLink
{
    private string $href = '';

    private string $target = '_blank';

    public function href(string $href): static
    {
        $this->href = $href;

        return $this;
    }

    public function target(string $target): static
    {
        $this->target = $target;

        return $this;
    }
}
