<?php

declare(strict_types=1);

namespace Flowframe\Brief\Atomic;

use Flowframe\Brief\Atomic\Contracts\PresetInterface;
use Flowframe\Brief\Atomic\ValueObjects\Rule;
use Flowframe\Brief\Atomic\ValueObjects\Theme;
use Flowframe\Brief\ValueObjects\Styles;

final class Atomic
{
    private Theme $theme;

    /**
     * @var Rule[]
     */
    private array $rules = [];

    /**
     * @param  PresetInterface[]  $presets
     */
    public function __construct(
        private array $presets = []
    ) {
        $this->theme = new Theme([]);

        foreach ($this->presets as $preset) {
            $this->extendTheme($preset->getTheme());
            $this->extendRules($preset->getRules());
        }
    }

    public static function make(array $presets = [], Theme $theme = new Theme([])): static
    {
        return new self($presets, $theme);
    }

    public function extendTheme(Theme $theme): static
    {
        $this->theme = $this->theme->merge($theme);

        return $this;
    }

    public function getTheme(): Theme
    {
        return $this->theme;
    }

    /**
     * @param  Rule[]  $rules
     */
    public function extendRules(array $rules): static
    {
        $this->rules = [
            ...$this->rules,
            ...$rules,
        ];

        return $this;
    }

    /**
     * @return Rule[]
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * Parse the input string and return the styles.
     */
    public function __invoke(string $input): Styles
    {
        $styles = new Styles([]);
        $classes = explode(' ', $input);

        foreach ($classes as $class) {
            foreach ($this->rules as $rule) {
                if (preg_match($rule->pattern, $class, $matches)) {
                    $ruleStyles = is_callable($rule->styles)
                        ? ($rule->styles)($this->theme, $matches)
                        : $rule->styles;

                    if (! $ruleStyles) {
                        continue;
                    }

                    $styles = $styles->merge($ruleStyles);

                    continue;
                }
            }
        }

        return $styles;
    }
}
