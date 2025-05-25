<?php

declare(strict_types=1);

namespace Flowframe\Brief\Components;

use Flowframe\Brief\Components\Concerns\HasLink;
use Flowframe\Brief\Components\Concerns\HasStyles;
use Flowframe\Brief\Components\Concerns\IsComponent;
use Flowframe\Brief\Components\Contracts\ComponentInterface;
use Flowframe\Brief\Components\Contracts\LinkInterface;
use Flowframe\Brief\Components\Contracts\StylesInterface;
use Flowframe\Brief\ValueObjects\Attributes;
use Flowframe\Brief\ValueObjects\Styles;

final class Link implements ComponentInterface, LinkInterface, StylesInterface
{
    use HasLink;
    use HasStyles;
    use IsComponent;

    public function render(?string $slot = null): string
    {
        $attributes = Attributes::make([
            'target' => $this->target,
            'href' => $this->href,
            'style' => Styles::make([
                'color' => '#067df7',
                'text-decoration-line' => 'none',
            ])->merge($this->getStyles()),
        ]);

        return <<<HTML
        <a {$attributes}>
            {$slot}
        </a>
        HTML;
    }
}
