<?php

declare(strict_types=1);

namespace Flowframe\Brief\Components;

use Flowframe\Brief\Components\Concerns\HasStyles;
use Flowframe\Brief\Components\Concerns\IsComponent;
use Flowframe\Brief\Components\Contracts\ComponentInterface;
use Flowframe\Brief\Components\Contracts\StylesInterface;
use Flowframe\Brief\ValueObjects\Attributes;
use Flowframe\Brief\ValueObjects\Styles;

final class Body implements ComponentInterface, StylesInterface
{
    use HasStyles;
    use IsComponent;

    public function render(?string $slot = null): string
    {
        $attributes = Attributes::make([
            'style' => Styles::make([
                'margin' => 0,
                'font-family' => 'Helvetica',
            ])->merge($this->getStyles()),
        ]);

        return <<<HTML
        <body {$attributes}>
            {$slot}
        </body>
        HTML;
    }
}
