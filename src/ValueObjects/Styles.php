<?php

declare(strict_types=1);

namespace Flowframe\Brief\ValueObjects;

final class Styles
{
    private array $styles = [];

    /**
     * @param  array<string,string>  $styles
     */
    public function __construct(array $styles)
    {
        $this->styles = $styles;
    }

    /**
     * @param  array<string,string>  $styles
     */
    public static function make(array $styles): static
    {
        return new self($styles);
    }

    /**
     * @return array<string,string>
     */
    public function getStyles(): array
    {
        return $this->styles;
    }

    public function merge(Styles $styles): self
    {
        $this->styles = [
            ...$this->styles,
            ...$styles->getStyles(),
        ];

        return $this;
    }

    public function inline(): string
    {
        $mapped = array_map(
            static fn (string $key, mixed $value) => sprintf(
                '%s:%s',
                $key,
                $value,
            ),
            array_keys($this->styles),
            array_values($this->styles),
        );

        return implode(';', $mapped);
    }

    public function find(string $key): Styles
    {
        foreach ($this->styles as $style => $value) {
            if ($style === $key) {
                return Styles::make([
                    $style => $value,
                ]);
            }
        }

        return Styles::make([]);
    }

    public function get(string $key): ?string
    {
        foreach ($this->styles as $style => $value) {
            if ($style === $key) {
                return $value;
            }
        }

        return null;
    }

    public function __toString(): string
    {
        return $this->inline();
    }
}
