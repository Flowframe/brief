<?php

declare(strict_types=1);

namespace Flowframe\Brief\Atomic\ValueObjects;

use Flowframe\Brief\Helpers\RecursiveArrayObjectTransformer;
use Flowframe\Brief\Helpers\RecursiveObjectMerger;

final class Theme
{
    public function __construct(private array $theme) {}

    public static function make(array $theme): static
    {
        return new self($theme);
    }

    public function merge(Theme $theme): self
    {
        $transformer = new RecursiveArrayObjectTransformer;
        $merger = new RecursiveObjectMerger;

        $current = $transformer->toObject($this->theme);
        $incoming = $transformer->toObject($theme->toArray());

        $mergedObjects = $merger->merge($current, $incoming);

        $this->theme = $transformer->toArray($mergedObjects);

        return $this;
    }

    public function get(string $property): mixed
    {
        $path = explode('.', $property);
        $current = $this->theme;

        foreach ($path as $segment) {
            $current = $current[$segment] ?? null;
        }

        return $current;
    }

    public function toArray(): array
    {
        return $this->theme;
    }
}
