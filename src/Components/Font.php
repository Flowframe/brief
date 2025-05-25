<?php

declare(strict_types=1);

namespace Flowframe\Brief\Components;

use Flowframe\Brief\Components\Contracts\VoidComponentInterface;

final class Font implements VoidComponentInterface
{
    private string $style = 'normal';

    private string $format = 'woff2';

    public function __construct(private string $family, private int $weight, private string $url) {}

    public static function make(string $family, int $weight, string $url): static
    {
        return new self($family, $weight, $url);
    }

    public function format(string $format): static
    {
        $this->format = $format;

        return $this;
    }

    public function render(): string
    {
        return <<<HTML
        <style>
            @font-face {
                font-family: {$this->family};
                font-style: {$this->style};
                font-weight: {$this->weight};
                src: url("{$this->url}") format("{$this->format}");
            }
        </style>
        HTML;
    }
}
