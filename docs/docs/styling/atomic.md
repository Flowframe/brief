# Atomic

Atomic is a utility CSS engine built in PHP.

## Usage

To use Atomic you create an instance. A `Styles` object gets returned when you invoke it.

You can opt-in to use the default preset which comes with Tailwind CSS like utilities.

```php
use Flowframe\Brief\Support\Atomic;
use Flowframe\Brief\Support\Atomic\Presets\DefaultPreset;

$atomic = Atomic::make([new DefaultPreset]);

$atomic('bg-gray-50 text-xl');

// new Styles([
//     'background-color' => '#f9fafb',
//     'font-size' => '20px',
//     'line-height' => '28px',
// ]);
```

::: tip
It's recommended to euther make an Atomic factory or bind an instance to the service container. This way the configuration is all managed in one place.
:::

## Extending

You can extend Atomic on the fly without creating presets.

### Extending themes

To extend a theme you chain `extendTheme()`:

```php
use Flowframe\Brief\Support\Atomic;
use Flowframe\Brief\Support\Atomic\ValueObjects\Theme;
use Flowframe\Brief\Support\Atomic\Presets\DefaultPreset;

$atomic = Atomic::make([new DefaultPreset])
    ->extendTheme(Theme::make([
        'colors' => [
            'gray' => [
                1000 => 'black',
            ],
        ],
    ]));

$atomic('bg-gray-1000');

// new Styles([
//     'background-color' => 'black',
// ]);
```

This will merge the current theme with the given one. If the given key already exists in it'll override the existing one.

### Extending rules

To extend rules you chain `extendRules()`:

```php
use Flowframe\Brief\Support\Atomic;
use Flowframe\Brief\Support\Atomic\ValueObjects\Rules;
use Flowframe\Brief\Support\Atomic\Presets\DefaultPreset;

$atomic = Atomic::make([new DefaultPreset])
    ->extendRules([
        new Rule('/^bg-hotpink$/', new Styles([
            'background-color' => 'hotpink',
        ])),
    ]);

$atomic('bg-hotpink');

// new Styles([
//     'background-color' => 'hotpink',
// ]);
```
