<?php

declare(strict_types=1);

namespace Flowframe\Brief\Components;

use Flowframe\Brief\Components\Concerns\IsComponent;
use Flowframe\Brief\Components\Contracts\ComponentInterface;
use Flowframe\Brief\ValueObjects\Attributes;

final class Html implements ComponentInterface
{
    use IsComponent;

    private ?string $lang = 'en';

    public function lang(string $lang): static
    {
        $this->lang = $lang;

        return $this;
    }

    public function render(?string $slot = null): string
    {
        $attributes = Attributes::make([
            'lang' => $this->lang,
            'dir' => 'ltr',
        ]);

        return <<<HTML
        <html {$attributes}>
            {$slot}
        </html>
        HTML;
    }
}
