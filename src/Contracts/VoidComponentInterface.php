<?php

declare(strict_types=1);

namespace Flowframe\Brief\Contracts;

interface VoidComponentInterface
{
    public function render(): string;
}
