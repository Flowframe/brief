<?php

declare(strict_types=1);

namespace Flowframe\Brief\Contracts;

interface RendererInterface
{
    /**
     * Render a component tree.
     */
    public function render(VoidComponentInterface|ComponentInterface $component): string;
}
