<?php

declare(strict_types=1);

namespace Flowframe\Brief\Contracts;

interface RendererInterface
{
    public function render(VoidComponentInterface|ComponentInterface $component): string;
}
