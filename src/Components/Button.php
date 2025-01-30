<?php

declare(strict_types=1);

namespace Flowframe\Brief\Components;

use Flowframe\Brief\Concerns\HasLink;
use Flowframe\Brief\Concerns\HasStyles;
use Flowframe\Brief\Concerns\IsComponent;
use Flowframe\Brief\Contracts\ComponentInterface;
use Flowframe\Brief\Contracts\LinkInterface;
use Flowframe\Brief\Contracts\StylesInterface;
use Flowframe\Brief\ValueObjects\Attributes;
use Flowframe\Brief\ValueObjects\Styles;

final class Button implements ComponentInterface, LinkInterface, StylesInterface
{
    use HasLink;
    use HasStyles;
    use IsComponent;

    public function render(?string $slot = null): string
    {
        $styles = Styles::make([
            'line-height' => '100%',
            'text-decoration' => 'none',
            'display' => 'inline-block',
            'max-width' => '100%',
            'box-sizing' => 'border-box',
            'font-size' => '14px',
            'padding' => '8px 10px',
            'font-weight' => 500,
            'border-top-right-radius' => '4px',
            'border-bottom-right-radius' => '4px',
            'border-bottom-left-radius' => '4px',
            'border-top-left-radius' => '4px',
            'text-align' => 'center',
            'background-color' => 'rgb(79,70,229)',
            'color' => 'rgb(255,255,255)',
        ])->merge($this->getStyles());

        $attributes = Attributes::make([
            'style' => $styles,
            'target' => $this->target,
            'href' => $this->href,
        ]);

        return <<<HTML
        <a {$attributes}>
            {$slot}
        </a>
        HTML;
    }
}
