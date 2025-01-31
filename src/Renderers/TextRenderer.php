<?php

declare(strict_types=1);

namespace Flowframe\Brief\Renderers;

use Flowframe\Brief\Components\Contracts\ComponentInterface;
use Flowframe\Brief\Components\Contracts\LinkInterface;
use Flowframe\Brief\Components\Contracts\VoidComponentInterface;
use Flowframe\Brief\Renderers\Contracts\TextRendererInterface;

final class TextRenderer implements TextRendererInterface
{
    public function render(VoidComponentInterface|ComponentInterface|string $root): string
    {
        $lines = $this->parse($root);

        return implode(PHP_EOL.PHP_EOL, $lines);
    }

    private function parse(VoidComponentInterface|ComponentInterface|string $component, array $lines = []): array
    {
        if ($component instanceof VoidComponentInterface) {
            return $lines;
        }

        if (is_string($component)) {
            $lines[] = $component;
        }

        if ($component instanceof ComponentInterface) {
            foreach ($component->getChildren() as $child) {
                $result = is_callable($child) ? $child() : $child;

                $lines = [
                    ...$lines,
                    ...$this->parse($result),
                ];
            }
        }

        if ($component instanceof LinkInterface) {
            $lines[] = sprintf('[%s]', $component->getHref());
        }

        return $lines;
    }
}
