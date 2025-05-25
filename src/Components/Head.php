<?php

declare(strict_types=1);

namespace Flowframe\Brief\Components;

use Flowframe\Brief\Components\Concerns\IsComponent;
use Flowframe\Brief\Components\Contracts\ComponentInterface;

final class Head implements ComponentInterface
{
    use IsComponent;

    public function render(?string $slot = null): string
    {
        return <<<HTML
        <head>
            <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
            <meta name="x-apple-disable-message-reformatting">
            {$slot}
        </head>
        HTML;
    }
}
