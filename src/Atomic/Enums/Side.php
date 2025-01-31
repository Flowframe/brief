<?php

declare(strict_types=1);

namespace Flowframe\Brief\Atomic\Enums;

enum Side: string
{
    case Top = 't';
    case Right = 'r';
    case Bottom = 'b';
    case Left = 'l';

    public function long(): string
    {
        return strtolower($this->name);
    }
}
