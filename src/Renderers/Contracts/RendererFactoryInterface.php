<?php

declare(strict_types=1);

namespace Flowframe\Brief\Renderers\Contracts;

use Flowframe\Brief\Components\Contracts\ComponentInterface;
use Flowframe\Brief\Components\Contracts\VoidComponentInterface;

interface RendererFactoryInterface
{
    public function toHtml(VoidComponentInterface|ComponentInterface|string $root): string;

    public function toText(VoidComponentInterface|ComponentInterface|string $root): string;
}
