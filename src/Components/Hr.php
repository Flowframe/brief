<?php

declare(strict_types=1);

namespace Flowframe\Brief\Components;

use Flowframe\Brief\Concerns\HasStyles;
use Flowframe\Brief\Contracts\StylesInterface;
use Flowframe\Brief\Contracts\VoidComponentInterface;
use Flowframe\Brief\ValueObjects\Attributes;
use Flowframe\Brief\ValueObjects\Styles;

final class Hr implements StylesInterface, VoidComponentInterface
{
    use HasStyles;

    public static function make(): static
    {
        return new self;
    }

    public function render(): string
    {
        $styles = Styles::make([
            'width' => '100%',
            'border' => 0,
            'margin' => 0,
        ])->merge($this->getStyles());

        $attributes = Attributes::make([
            'style' => $styles,
        ]);

        return <<<HTML
        <hr {$attributes}>
        HTML;
    }
}
