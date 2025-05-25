<?php

declare(strict_types=1);

namespace Flowframe\Brief\Components\Concerns;

trait HasLink
{
    private string $href = '';

    private string $target = '_blank';

    /**
     * Set the link href.
     */
    public function href(string $href): static
    {
        $this->href = $href;

        return $this;
    }

    /**
     * Set the link target.
     */
    public function target(string $target): static
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get the link href.
     */
    public function getHref(): string
    {
        return $this->href;
    }
}
