<?php

declare(strict_types=1);

namespace Flowframe\Brief\Components;

use Flowframe\Brief\Concerns\HasStyles;
use Flowframe\Brief\Concerns\IsComponent;
use Flowframe\Brief\Contracts\ComponentInterface;
use Flowframe\Brief\Contracts\StylesInterface;
use Flowframe\Brief\ValueObjects\Attributes;

final class Section implements ComponentInterface, StylesInterface
{
    use HasStyles;
    use IsComponent;

    public function render(?string $slot = null): string
    {
        $attributes = Attributes::make([
            'align' => 'center',
            'width' => '100%',
            'border' => '0',
            'cellpadding' => '0',
            'cellspacing' => '0',
            'role' => 'presentation',
            'style' => $this->getStyles(),
        ]);

        return <<<HTML
        <table {$attributes}>
            <tbody>
                <tr style="width:100%">
                    <td>
                        {$slot}
                    </td>
                </tr>
            </tbody>
        </table>
        HTML;
    }
}
