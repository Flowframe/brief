<?php

declare(strict_types=1);

namespace Flowframe\Brief\Renderers\Contracts;

use Flowframe\Brief\Components\Contracts\ComponentInterface;
use Flowframe\Brief\Components\Contracts\VoidComponentInterface;

interface HtmlRendererInterface
{
    /**
     * Render a component tree to html.
     */
    public function render(VoidComponentInterface|ComponentInterface|string $root): string;
}
