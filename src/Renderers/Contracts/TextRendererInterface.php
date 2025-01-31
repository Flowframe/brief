<?php

declare(strict_types=1);

namespace Flowframe\Brief\Renderers\Contracts;

use Flowframe\Brief\Components\Contracts\ComponentInterface;
use Flowframe\Brief\Components\Contracts\VoidComponentInterface;

interface TextRendererInterface
{
    /**
     * Render a component tree to plain text.
     */
    public function render(VoidComponentInterface|ComponentInterface|string $root): string;
}
