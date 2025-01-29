<?php

declare(strict_types=1);

namespace Flowframe\Brief\Renderers;

use Flowframe\Brief\Contracts\ComponentInterface;
use Flowframe\Brief\Contracts\RendererInterface;
use Flowframe\Brief\Contracts\VoidComponentInterface;

class HtmlRenderer implements RendererInterface
{
    public function render(VoidComponentInterface|ComponentInterface $component): string
    {
        if ($component instanceof VoidComponentInterface) {
            return $component->render();
        }

        if (count($component->getChildren()) < 1) {
            return $component->render();
        }

        $slot = '';

        foreach ($component->getChildren() as $child) {
            if (is_callable($child)) {
                $result = $child();

                if (is_string($result)) {
                    $slot .= $result;

                    continue;
                }

                $slot .= $this->render($result);

                continue;
            }

            if (is_string($child)) {
                $slot .= $child;

                continue;
            }

            $slot .= $this->render($child);
        }

        return $component->render($slot);
    }
}
