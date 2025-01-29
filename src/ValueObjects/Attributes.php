<?php

declare(strict_types=1);

namespace Flowframe\Brief\ValueObjects;

final class Attributes
{
    public function __construct(
        public array $attributes
    ) {}

    /**
     * @param  array<string,string|int>  $attributes
     */
    public static function make(array $attributes): static
    {
        return new self($attributes);
    }

    /**
     * @return array<string,string>
     */
    public function getFilledAttributes(): array
    {
        return array_filter($this->attributes, function (string $value) {
            if (trim($value) === '') {
                return false;
            }

            return $value !== null;
        });
    }

    public function __toString(): string
    {
        $pairs = [];

        foreach ($this->getFilledAttributes() as $key => $value) {
            $pairs[] = sprintf('%s="%s"', $key, $value);
        }

        return implode(' ', $pairs);
    }
}
