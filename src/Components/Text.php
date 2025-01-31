<?php

declare(strict_types=1);

namespace Flowframe\Brief\Components;

use Flowframe\Brief\Components\Concerns\HasStyles;
use Flowframe\Brief\Components\Concerns\IsComponent;
use Flowframe\Brief\Components\Contracts\ComponentInterface;
use Flowframe\Brief\Components\Contracts\StylesInterface;
use Flowframe\Brief\ValueObjects\Attributes;

final class Text implements ComponentInterface, StylesInterface
{
    use HasStyles;
    use IsComponent;

    public function render(?string $slot = null): string
    {
        $attributes = Attributes::make([
            'style' => $this->getStyles(),
        ]);

        return <<<HTML
        <p {$attributes}>
            {$slot}
        </p>
        HTML;
    }
}
