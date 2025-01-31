<?php

declare(strict_types=1);

namespace Flowframe\Brief\Components;

use Flowframe\Brief\Components\Concerns\HasStyles;
use Flowframe\Brief\Components\Concerns\IsComponent;
use Flowframe\Brief\Components\Contracts\StylesInterface;
use Flowframe\Brief\Components\Contracts\VoidComponentInterface;
use Flowframe\Brief\ValueObjects\Attributes;
use Flowframe\Brief\ValueObjects\Styles;

final class Img implements StylesInterface, VoidComponentInterface
{
    use HasStyles;
    use IsComponent;

    private ?int $width = null;

    private ?int $height = null;

    public function __construct(private string $src, private string $alt = '') {}

    public static function make(string $src, string $alt = ''): static
    {
        return new self($src, $alt);
    }

    public function width(int $width): static
    {
        $this->width = $width;

        return $this;
    }

    public function height(int $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function size(int $size): static
    {
        $this->width = $size;
        $this->height = $size;

        return $this;
    }

    public function render(): string
    {
        $styles = Styles::make([
            'display' => 'block',
            'outline' => 'none',
            'border' => 'none',
            'textDecoration' => 'none',
        ])->merge($this->getStyles());

        $attributes = Attributes::make([
            'src' => $this->src,
            'width' => $this->width ?? (int) $styles->get('width'),
            'height' => $this->height ?? (int) $styles->get('height'),
            'alt' => $this->alt,
            'style' => $styles,
        ]);

        return <<<HTML
        <img {$attributes}>
        HTML;
    }
}
