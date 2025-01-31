<?php

declare(strict_types=1);

namespace Flowframe\Brief\Atomic\Enums;

enum Corner: string
{
    case TopRight = 'tr';
    case BottomRight = 'br';
    case BottomLeft = 'bl';
    case TopLeft = 'tl';

    public function long(): string
    {
        return match ($this) {
            self::TopRight => 'top-right',
            self::BottomRight => 'bottom-right',
            self::BottomLeft => 'bottom-left',
            self::TopLeft => 'top-left',
        };
    }
}
