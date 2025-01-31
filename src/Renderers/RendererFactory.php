<?php

declare(strict_types=1);

namespace Flowframe\Brief\Renderers;

use Flowframe\Brief\Components\Contracts\ComponentInterface;
use Flowframe\Brief\Components\Contracts\VoidComponentInterface;
use Flowframe\Brief\Renderers\Contracts\RendererFactoryInterface;

final class RendererFactory implements RendererFactoryInterface
{
    public function __construct(
        private HtmlRenderer $htmlRenderer,
        private TextRenderer $textRenderer
    ) {}

    public function toHtml(VoidComponentInterface|ComponentInterface|string $root): string
    {
        return $this->htmlRenderer->render($root);
    }

    public function toText(VoidComponentInterface|ComponentInterface|string $root): string
    {
        return $this->textRenderer->render($root);
    }
}
