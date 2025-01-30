<?php

declare(strict_types=1);

namespace Flowframe\Brief\Contracts;

interface VoidComponentInterface
{
    /**
     * Render the component.
     */
    public function render(): string;
}
