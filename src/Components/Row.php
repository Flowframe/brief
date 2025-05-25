<?php

declare(strict_types=1);

namespace Flowframe\Brief\Components;

use Flowframe\Brief\Components\Concerns\IsComponent;
use Flowframe\Brief\Components\Contracts\ComponentInterface;
use Flowframe\Brief\ValueObjects\Attributes;
use Flowframe\Brief\ValueObjects\Styles;

final class Row implements ComponentInterface
{
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
