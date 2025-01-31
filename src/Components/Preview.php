<?php

declare(strict_types=1);

namespace Flowframe\Brief\Components;

use Flowframe\Brief\Components\Contracts\VoidComponentInterface;
use Flowframe\Brief\ValueObjects\Attributes;
use Flowframe\Brief\ValueObjects\Styles;

final class Preview implements VoidComponentInterface
{
    public function __construct(
        private string $text,
    ) {}

    public static function make(string $text): static
    {
        return new self($text);
    }

    public function getText(): string
    {
        $whitespace = '\xa0\u200C\u200B\u200D\u200E\u200F\uFEFF';
        $maxLength = 150;
        $textLength = strlen($this->text);

        if ($textLength >= $maxLength) {
            return $this->text;
        }

        return $this->text.str_repeat($whitespace, $maxLength - $textLength);
    }

    public function render(): string
    {
        $attributes = Attributes::make([
            'style' => Styles::make([
                'display' => 'none',
                'overflow' => 'hidden',
                'line-height' => '1px',
                'opacity' => 0,
                'max-height' => 0,
                'max-width' => 0,
            ]),
        ]);

        return <<<HTML
        <div {$attributes}>{$this->getText()}</div>
        HTML;
    }
}
