# Presets

Presets are a way to reuse custom rules and themes.

## Usage

To create a preset implement the `PresetInterface`:

```php
interface PresetInterface
{
    /**
     * Get the rules that should be applied.
     *
     * @return Rule[]
     */
    public function getRules(): array;

    /**
     * Get the theme that should be merged.
     */
    public function getTheme(): Theme;
}
```

When a preset is passed to Atomic it'll automatically merge the new rules and theme.

## Example

```php
use Flowframe\Brief\ValueObjects\Styles;
use Flowframe\Brief\Atomic\ValueObjects\Rule;
use Flowframe\Brief\Atomic\ValueObjects\Theme;
use Flowframe\Brief\Atomic\Contracts\PresetInterface;

class MyPreset implements PresetInterface
{
    public function getRules(): array
    {
        return [
            new Rule(
                '/^background-(.*)$/',
                function (Theme $theme, $matches) {
                    $path = str_replace('-', '.', $matches[1]);

                    $value = $theme->get("backgrounds.{$matches[1]}")
                        ?? $theme->get("backgrounds.{$path}")
                        ?? $matches[1];

                    return new Styles([
                        'background-color' => $value,
                    ]);
                },
            ),
        ];
    }

    public function getTheme(): Theme
    {
        return Theme::make([
            'backgrounds' => [
                'brand' => [
                    'default' => 'hotpink',
                ],
            ];
        ]);
    }
}
```
