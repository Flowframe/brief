<?php

declare(strict_types=1);

namespace Flowframe\Brief\Contracts;

interface LinkInterface
{
    /**
     * Set the link href.
     */
    public function href(string $href): static;

    /**
     * Set the link target.
     */
    public function target(string $target): static;
}
