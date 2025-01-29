<?php

declare(strict_types=1);

namespace Flowframe\Brief\Contracts;

interface ComponentInterface
{
    public static function make(ComponentInterface|VoidComponentInterface|string ...$children): static;

    public function getChildren(): array;

    public function render(?string $slot = null): string;
}
