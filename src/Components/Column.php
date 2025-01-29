<?php

declare(strict_types=1);

namespace Flowframe\Brief\Components;

use Flowframe\Brief\Concerns\HasStyles;
use Flowframe\Brief\Concerns\IsComponent;
use Flowframe\Brief\Contracts\ComponentInterface;
use Flowframe\Brief\Contracts\StylesInterface;
use Flowframe\Brief\ValueObjects\Attributes;

final class Column implements ComponentInterface, StylesInterface
{
    use HasStyles;
    use IsComponent;

    public function render(?string $slot = null): string
    {
        $attributes = Attributes::make([
            'style' => $this->getStyles(),
        ]);

        return <<<HTML
        <td {$attributes}>
            {$slot}
        </td>
        HTML;
    }
}
