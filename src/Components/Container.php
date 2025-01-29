<?php

declare(strict_types=1);

namespace Flowframe\Brief\Components;

use Flowframe\Brief\Concerns\HasStyles;
use Flowframe\Brief\Concerns\IsComponent;
use Flowframe\Brief\Contracts\ComponentInterface;
use Flowframe\Brief\Contracts\StylesInterface;
use Flowframe\Brief\ValueObjects\Attributes;
use Flowframe\Brief\ValueObjects\Styles;

final class Container implements ComponentInterface, StylesInterface
{
    use HasStyles;
    use IsComponent;

    public function render(?string $slot = null): string
    {
        $styles = Styles::make([
            'max-width' => '37.5em',
        ])->merge($this->getStyles());

        $attributes = Attributes::make([
            'align' => 'center',
            'width' => '100%',
            'border' => '0',
            'cellpadding' => '0',
            'cellspacing' => '0',
            'role' => 'presentation',
            'style' => $styles,
        ]);

        $trAttributes = Attributes::make([
            'style' => Styles::make([
                'width' => '100%',
            ]),
        ]);

        return <<<HTML
        <table {$attributes}>
            <tbody>
                <tr {$trAttributes}>
                    <td>
                        {$slot}
                    </td>
                </tr>
            </tbody>
        </table>
        HTML;
    }
}
