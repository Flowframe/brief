<?php

declare(strict_types=1);

namespace Flowframe\Brief\Concerns;

use Closure;
use Flowframe\Brief\Contracts\ComponentInterface;
use Flowframe\Brief\Contracts\VoidComponentInterface;

trait IsComponent
{
    /**
     * @param  array<int,ComponentInterface|VoidComponentInterface|Closure|string>  $children
     */
    public function __construct(private array $children = []) {}

    /**
     * @return array<int,ComponentInterface|VoidComponentInterface|Closure|string>
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    public static function make(ComponentInterface|VoidComponentInterface|Closure|string ...$children): static
    {
        return new self([...$children]);
    }
}
