<?php

declare(strict_types=1);

namespace Flowframe\Brief\Support\Atomic\Presets;

use Flowframe\Brief\Support\Atomic\Enums\Corner;
use Flowframe\Brief\Support\Atomic\Enums\Side;
use Flowframe\Brief\Support\Atomic\Interfaces\PresetInterface;
use Flowframe\Brief\Support\Atomic\ValueObjects\Rule;
use Flowframe\Brief\Support\Atomic\ValueObjects\Theme;
use Flowframe\Brief\ValueObjects\Styles;

/**
 * @codeCoverageIgnore
 */
final class DefaultPreset implements PresetInterface
{
    public function getRules(): array
    {
        return [
            $this->fontFamilyRule(),
            ...$this->italicRules(),
            ...$this->displayRules(),
            ...$this->paddingRules(),
            ...$this->marginRules(),
            ...$this->widthRules(),
            ...$this->heightRules(),
            ...$this->borderRadiusRules(),
            ...$this->borderSizeRules(),
            $this->borderStyleRule(),
            ...$this->borderColorRules(),
            $this->textAlignRule(),
            $this->fontSizeRule(),
            $this->alignRule(),
            $this->objectRule(),
            $this->lineHeightRule(),
            $this->fontWeightRule(),
            $this->opacityRule(),
            $this->sizeRule(),
            $this->backgroundColorRule(),
            $this->colorRule(),
            $this->boxShadowRule(),
        ];
    }

    private function textAlignRule(): Rule
    {
        return new Rule(
            '/^text-(left|center|right)$/',
            fn (Theme $theme, array $matches) => new Styles([
                'text-align' => $matches[1],
            ]),
        );
    }

    private function fontFamilyRule(): Rule
    {
        return new Rule(
            '/^font-(.*)$/',
            function (Theme $theme, array $matches) {
                $value = $theme->get("font_family.{$matches[1]}");

                if ($value === null) {
                    return null;
                }

                return new Styles([
                    'font-family' => $value,
                ]);
            },
        );
    }

    private function fontSizeRule(): Rule
    {
        return new Rule(
            '/^text-(.*)$/',
            function (Theme $theme, $matches) {
                $value = $theme->get("font_size.{$matches[1]}");

                if ($value === null) {
                    return null;
                }

                if (is_array($value)) {
                    return new Styles([
                        'font-size' => $value[0],
                        'line-height' => $value[1],
                    ]);
                }

                return new Styles([
                    'font-size' => $value,
                ]);
            },
        );
    }

    private function fontWeightRule(): Rule
    {
        return new Rule(
            '/^font-(.*)$/',
            function (Theme $theme, $matches) {
                $value = $theme->get("font_weight.{$matches[1]}");

                if ($value === null) {
                    return null;
                }

                return new Styles([
                    'font-weight' => $value,
                ]);
            },
        );
    }

    private function lineHeightRule(): Rule
    {
        return new Rule(
            '/^leading-(.*)$/',
            fn (Theme $theme, $matches) => new Styles([
                'line-height' => $theme->get("line_height.{$matches[1]}") ?? $matches[1],
            ]),
        );
    }

    private function boxShadowRule(): Rule
    {
        return new Rule(
            '/^shadow-(.*)$/',
            function (Theme $theme, $matches) {
                $value = $theme->get("box_shadow.{$matches[1]}") ?? 'default';

                return new Styles([
                    'box-shadow' => $value,
                ]);
            },
        );
    }

    private function displayRules(): array
    {
        $utilities = [
            'hidden' => 'none',
            'block' => 'block',
            'inline' => 'inline',
            'inline-block' => 'inline-block',
        ];

        $rules = [];

        foreach ($utilities as $utility => $value) {
            $rules[] = new Rule(
                "/^{$utility}$/",
                new Styles(['display' => $value]),
            );
        }

        return $rules;
    }

    private function opacityRule(): Rule
    {
        return new Rule(
            '/^opacity-(.*)$/',
            fn (Theme $theme, $matches) => new Styles(['opacity' => $matches[1] / 100]),
        );
    }

    private function backgroundColorRule(): Rule
    {
        return new Rule(
            '/^bg-(.*)$/',
            function (Theme $theme, $matches) {
                $path = str_replace('-', '.', $matches[1]);

                $value = $theme->get("colors.{$matches[1]}")
                    ?? $theme->get("colors.{$path}")
                    ?? $matches[1];

                return new Styles([
                    'background-color' => $value,
                ]);
            },
        );
    }

    private function colorRule(): Rule
    {
        return new Rule(
            '/^text-(.*)$/',
            function (Theme $theme, $matches) {
                $path = str_replace('-', '.', $matches[1]);

                $value = $theme->get("colors.{$matches[1]}") ?? $theme->get("colors.{$path}");

                if ($value === null) {
                    return null;
                }

                return new Styles([
                    'color' => $value,
                ]);
            },
        );
    }

    private function widthRules(): array
    {
        $value = fn (Theme $theme, array $matches) => $theme->get("spacing.{$matches[1]}") ?? $matches[1] * 4 .'px';

        return [
            new Rule(
                '/^w-(.*)$/',
                fn (Theme $theme, $matches) => new Styles(['width' => $value($theme, $matches)]),
            ),
            new Rule(
                '/^min-w-(.*)$/',
                fn (Theme $theme, $matches) => new Styles(['min-width' => $value($theme, $matches)]),
            ),
            new Rule(
                '/^max-w-(.*)$/',
                fn (Theme $theme, $matches) => new Styles(['max-width' => $value($theme, $matches)]),
            ),
        ];
    }

    private function heightRules(): array
    {
        $value = fn (Theme $theme, array $matches) => $theme->get("spacing.{$matches[1]}") ?? $matches[1] * 4 .'px';

        return [
            new Rule(
                '/^h-(.*)$/',
                fn (Theme $theme, $matches) => new Styles(['height' => $value($theme, $matches)]),
            ),
            new Rule(
                '/^min-h-(.*)$/',
                fn (Theme $theme, $matches) => new Styles(['min-height' => $value($theme, $matches)]),
            ),
            new Rule(
                '/^max-h-(.*)$/',
                fn (Theme $theme, $matches) => new Styles(['max-height' => $value($theme, $matches)]),
            ),
        ];
    }

    private function sizeRule(): Rule
    {
        return new Rule(
            '/^size-(.*)$/',
            fn (Theme $theme, $matches) => new Styles(['height' => $theme->get("spacing.{$matches[1]}") ?? $matches[1] * 4 .'px']),
        );
    }

    private function borderStyleRule(): Rule
    {
        return new Rule(
            '/^border-(solid|dashed|dotted|double|groove|ridge|inset|outset|none|hidden)$/',
            fn (Theme $theme, $matches) => new Styles(['border-style' => $matches[1]]),
        );
    }

    private function italicRules(): array
    {
        return [
            new Rule(
                '/^italic$/',
                fn (Theme $theme, $matches) => new Styles(['font-style' => 'italic']),
            ),
            new Rule(
                '/^not-italic$/',
                fn (Theme $theme, $matches) => new Styles(['font-style' => 'normal']),
            ),
        ];
    }

    private function alignRule(): Rule
    {
        return new Rule(
            '/^align-(baseline|top|middle|bottom)$/',
            fn (Theme $theme, $matches) => new Styles(['vertical-align' => $matches[1]]),
        );
    }

    private function objectRule(): Rule
    {
        return new Rule(
            '/^object-(contain|cover|fill|none|scale-down)$/',
            fn (Theme $theme, $matches) => new Styles(['vertical-align' => $matches[1]]),
        );
    }

    private function paddingRules(): array
    {
        $rules = [
            new Rule(
                '/^p-(.*)$/',
                function (Theme $theme, $matches) {
                    $value = $theme->get("spacing.{$matches[1]}") ?? $matches[1] * 4 .'px';

                    $sides = [];

                    foreach (Side::cases() as $side) {
                        $sides["padding-{$side->long()}"] = $value;
                    }

                    return new Styles($sides);
                },
            ),
            new Rule(
                '/^p(x|y)-(.*)$/',
                function (Theme $theme, $matches) {
                    $value = $theme->get("spacing.{$matches[2]}") ?? $matches[2] * 4 .'px';

                    return match ($matches[1]) {
                        'x' => new Styles([
                            'padding-left' => $value,
                            'padding-right' => $value,
                        ]),
                        'y' => new Styles([
                            'padding-top' => $value,
                            'padding-bottom' => $value,
                        ])
                    };
                },
            ),
        ];

        foreach (Side::cases() as $side) {
            $rules[] = new Rule(
                "/^p{$side->value}-(.*)$/",
                fn (Theme $theme, $matches) => new Styles([
                    "padding-{$side->long()}" => $theme->get("spacing.{$matches[1]}") ?? $matches[1] * 4 .'px',
                ]),
            );
        }

        return $rules;
    }

    private function marginRules(): array
    {
        $rules = [
            new Rule(
                '/^m-(.*)$/',
                function (Theme $theme, $matches) {
                    $value = $theme->get("spacing.{$matches[1]}") ?? $matches[1] * 4 .'px';

                    $sides = [];

                    foreach (Side::cases() as $side) {
                        $sides["margin-{$side->long()}"] = $value;
                    }

                    return new Styles($sides);
                },
            ),
            new Rule(
                '/^m(x|y)-(.*)$/',
                function (Theme $theme, $matches) {
                    $value = $theme->get("spacing.{$matches[2]}") ?? $matches[2] * 4 .'px';

                    return match ($matches[1]) {
                        'x' => new Styles([
                            'margin-left' => $value,
                            'margin-right' => $value,
                        ]),
                        'y' => new Styles([
                            'margin-top' => $value,
                            'margin-bottom' => $value,
                        ])
                    };
                },
            ),
        ];

        foreach (Side::cases() as $side) {
            $rules[] = new Rule(
                "/^m{$side->value}-(.*)$/",
                fn (Theme $theme, $matches) => new Styles([
                    "margin-{$side->long()}" => $theme->get("spacing.{$matches[1]}") ?? $matches[1] * 4 .'px',
                ]),
            );
        }

        return $rules;
    }

    private function borderRadiusRules(): array
    {
        $rules = [];

        foreach (Corner::cases() as $corner) {
            $rules[] = new Rule(
                "/^rounded-{$corner->value}(?:-(.*))?$/",
                function (Theme $theme, $matches) use ($corner) {
                    $match = $matches[1] ?? 'default';
                    $value = $theme->get("border_radius.{$match}");

                    if ($value === null) {
                        return null;
                    }

                    return new Styles([
                        "border-{$corner->long()}-radius" => $value,
                    ]);
                },
            );
        }

        $rules[] = new Rule(
            '/^rounded(?:-(.*))?$/',
            function (Theme $theme, $matches) {
                $match = $matches[1] ?? 'default';
                $value = $theme->get("border_radius.{$match}");

                if ($value === null) {
                    return null;
                }

                $sides = [];

                foreach (Corner::cases() as $corner) {
                    $sides["border-{$corner->long()}-radius"] = $value;
                }

                return new Styles($sides);
            },
        );

        return $rules;
    }

    private function borderSizeRules(): array
    {
        $rules = [
            new Rule(
                '/^border-(x|y)(?:-(.*))?$/',
                function (Theme $theme, $matches) {
                    $match = $matches[2] ?? 'default';
                    $value = $theme->get("border_width.{$match}");

                    if ($value === null) {
                        return null;
                    }

                    return match ($matches[1]) {
                        'x' => new Styles([
                            'border-right-width' => $value,
                            'border-left-width' => $value,
                            'border-style' => 'solid',
                        ]),
                        'y' => new Styles([
                            'border-top-width' => $value,
                            'border-bottom-width' => $value,
                            'border-style' => 'solid',
                        ]),
                    };
                },
            ),
        ];

        foreach (Side::cases() as $side) {
            $rules[] = new Rule(
                "/^border-{$side->value}(?:-(.*))?$/",
                function (Theme $theme, $matches) use ($side) {
                    $match = $matches[1] ?? 'default';
                    $value = $theme->get("border_width.{$match}");

                    if ($value === null) {
                        return null;
                    }

                    return new Styles([
                        "border-{$side->long()}-width" => $value,
                        "border-{$side->long()}-style" => 'solid',
                    ]);
                },
            );
        }

        $rules[] = new Rule(
            '/^border(?:-(.*))?$/',
            function (Theme $theme, $matches) {
                $match = $matches[1] ?? 'default';
                $value = $theme->get("border_width.{$match}");

                if ($value === null) {
                    return null;
                }

                $sides = [];

                foreach (Side::cases() as $side) {
                    $sides["border-{$side->long()}-width"] = $value;
                }

                return new Styles([
                    ...$sides,
                    'border-style' => 'solid',
                ]);
            },
        );

        return $rules;
    }

    private function borderColorRules(): array
    {
        $rules = [
            new Rule(
                '/^border-(x|y)(?:-(.*))?$/',
                function (Theme $theme, $matches) {
                    $path = str_replace('-', '.', $matches[1]);

                    $value = $theme->get("colors.{$matches[1]}")
                        ?? $theme->get("colors.{$path}")
                        ?? $matches[1];

                    if ($value === null) {
                        return null;
                    }

                    return match ($matches[1]) {
                        'x' => new Styles([
                            'border-right-color' => $value,
                            'border-left-color' => $value,
                        ]),
                        'y' => new Styles([
                            'border-top-color' => $value,
                            'border-bottom-color' => $value,
                        ]),
                    };
                },
            ),
        ];

        foreach (Side::cases() as $side) {
            $rules[] = new Rule(
                "/^border-{$side->value}(?:-(.*))?$/",
                function (Theme $theme, $matches) use ($side) {
                    $path = str_replace('-', '.', $matches[1] ?? 'default');

                    $value = $theme->get("colors.{$path}");

                    if ($value === null) {
                        return null;
                    }

                    return new Styles([
                        "border-{$side->long()}-color" => $value,
                    ]);
                },
            );
        }

        $rules[] = new Rule(
            '/^border(?:-(.*))?$/',
            function (Theme $theme, $matches) {
                $path = str_replace('-', '.', $matches[1]);

                $value = $theme->get("colors.{$matches[1]}")
                    ?? $theme->get("colors.{$path}")
                    ?? $matches[1];

                if ($value === null) {
                    return null;
                }

                $sides = [];

                foreach (Side::cases() as $side) {
                    $sides["border-{$side->long()}-color"] = $value;
                }

                return new Styles($sides);
            },
        );

        return $rules;
    }

    public function getTheme(): Theme
    {
        return Theme::make([
            'font_family' => [
                'sans' => 'Inter',
            ],
            'font_size' => [
                'xs' => ['12px', '16px'],
                'sm' => ['14px', '20px'],
                'base' => ['16px', '24px'],
                'lg' => ['18px', '28px'],
                'xl' => ['20px', '28px'],
                '2xl' => ['24px', '32px'],
                '3xl' => ['30px', '36px'],
                '4xl' => ['36px', '40px'],
                '5xl' => ['48px', '1'],
                '6xl' => ['60px', '1'],
                '7xl' => ['72px', '1'],
                '8xl' => ['96px', '1'],
                '9xl' => ['128px', '1'],
            ],
            'line_height' => [
                'none' => '1',
                'tightest' => '1.05',
                'tight' => '1.1',
                'snug' => '1.25',
                'normal' => '1.5',
                'relaxed' => '1.625',
                'loose' => '2',
                'base' => '24px',
                3 => '12px',
                4 => '16px',
                5 => '20px',
                6 => '24px',
                7 => '28px',
                8 => '32px',
                9 => '36px',
                10 => '40px',
            ],
            'font_weight' => [
                'thin' => '100',
                'extralight' => '200',
                'light' => '300',
                'normal' => '400',
                'medium' => '500',
                'semibold' => '600',
                'bold' => '700',
                'extrabold' => '800',
                'black' => '900',
            ],
            'colors' => [
                'white' => '#ffffff',
                'black' => '#000000',
                'blue' => [
                    50 => '#eff6ff',
                    100 => '#dbeafe',
                    200 => '#bfdbfe',
                    300 => '#93c5fd',
                    400 => '#60a5fa',
                    500 => '#3b82f6',
                    600 => '#2563eb',
                    700 => '#1a202c',
                    800 => '#171923',
                    900 => '#121317',
                ],
                'red' => [
                    50 => '#fef2f2',
                    100 => '#fee2e2',
                    200 => '#fecaca',
                    300 => '#faa5a5',
                    400 => '#f87171',
                    500 => '#ef4444',
                    600 => '#dc2626',
                    700 => '#b91c1c',
                    800 => '#991b1b',
                    900 => '#7f1d1d',
                ],
                'gray' => [
                    50 => '#f9fafb',
                    100 => '#f3f4f6',
                    200 => '#e5e7eb',
                    300 => '#d1d5db',
                    400 => '#9ca3af',
                    500 => '#6c757d',
                    600 => '#4b5154',
                    700 => '#343a40',
                    800 => '#2f363d',
                    900 => '#212529',
                ],
            ],
            'border_radius' => [
                'default' => '4px',
                'none' => '0px',
                'sm' => '2px',
                'md' => '4px',
                'lg' => '6px',
                'xl' => '8px',
                '2xl' => '10px',
                '3xl' => '12px',
                'full' => '9999px',
            ],
            'border_width' => [
                'default' => '1px',
                0 => '0',
                2 => '2px',
                3 => '3px',
                4 => '4px',
                6 => '6px',
                8 => '8px',
            ],
            'padding' => [
                'px' => '1px',
            ],
            'margin' => [
                'px' => '1px',
                'auto' => 'auto',
            ],
            'spacing' => [
                'px' => '1px',
                'auto' => 'auto',
                'full' => '100%',
                '1/2' => '50%',
                '1/3' => '33.333333%',
                '2/3' => '66.666667%',
                '1/4' => '25%',
                '2/4' => '50%',
                '3/4' => '75%',
                '1/5' => '20%',
                '2/5' => '40%',
                '3/5' => '60%',
                '4/5' => '80%',
                '1/6' => '16.666667%',
                '2/6' => '33.333333%',
                '3/6' => '50%',
                '4/6' => '66.666667%',
                '5/6' => '83.333333%',
                '1/12' => '8.333333%',
                '2/12' => '16.666667%',
                '3/12' => '25%',
                '4/12' => '33.333333%',
                '5/12' => '41.666667%',
                '6/12' => '50%',
                '7/12' => '58.333333%',
                '8/12' => '66.666667%',
                '9/12' => '75%',
                '10/12' => '83.333333%',
                '11/12' => '91.666667%',
            ],
            'box_shadow' => [
                'sm' => '0 1px 2px 0 rgb(0 0 0 / 0.05)',
                'default' => '0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)',
                'md' => '0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)',
                'lg' => '0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1)',
                'xl' => '0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)',
                '2xl' => '0 25px 50px -12px rgb(0 0 0 / 0.25)',
                'inner' => 'inset 0 2px 4px 0 rgb(0 0 0 / 0.05)',
                'none' => '0 0 #0000',
            ],
        ]);
    }
}
