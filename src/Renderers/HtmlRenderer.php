<?php

declare(strict_types=1);

namespace Flowframe\Brief\Renderers;

use Flowframe\Brief\Components\Contracts\ComponentInterface;
use Flowframe\Brief\Components\Contracts\VoidComponentInterface;
use Flowframe\Brief\Renderers\Contracts\HtmlRendererInterface;

final class HtmlRenderer implements HtmlRendererInterface
{
    public function render(VoidComponentInterface|ComponentInterface|string $component): string
    {
        $slot = '';

        if ($component instanceof VoidComponentInterface) {
            return $component->render();
        }

        if (is_string($component)) {
            $slot .= $component;

            return $slot;
        }

        foreach ($component->getChildren() as $child) {
            $result = is_callable($child) ? $child() : $child;

            $slot .= $this->render($result);
        }

        return $component->render($slot);
    }
}
