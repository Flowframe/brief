# Getting started

Install brief via Composer:

```sh
composer require flowframe/brief
```

## Creating a template

After installation, you can begin creating templates by defining their structure through components. The example below demonstrates a basic template structure:

```php
use Flowframe\Brief\Components\Html;
use Flowframe\Brief\Components\Body;
use Flowframe\Brief\Components\Container;
use Flowframe\Brief\Components\Section;
use Flowframe\Brief\Components\Text;
use Flowframe\Brief\Components\Hr;
use Flowframe\Brief\Components\Button;

$template = Html::make(
    Body::make(
        Container::make(
            Section::make(
                Text::make('Reset your password'),

                Text::make(<<<'TEXT'
                We've received a new password reset request,
                if this wasn't you then ignore this email.
                TEXT),
            ),

            Hr::make(),

            Section::make(
                Button::make('Reset password')
                    ->href('https://example.com')
            ),

            Text::make('Copyright 2025 Acme Corp.')
        )
    )
)
```

## Rendering templates

To render the template, use the `HtmlRenderer`:

```php
use Flowframe\Brief\Components\Html;
use Flowframe\Brief\Components\Body;
use Flowframe\Brief\Components\Container;
use Flowframe\Brief\Components\Section;
use Flowframe\Brief\Components\Text;
use Flowframe\Brief\Components\Hr;
use Flowframe\Brief\Components\Button;
use Flowframe\Brief\Renderers\HtmlRenderer; // [!code ++]

$template = Html::make(
    Body::make(
        Container::make(
            Section::make(
                Text::make('Reset your password'),

                Text::make(<<<'TEXT'
                We've received a new password reset request,
                if this wasn't you then ignore this email.
                TEXT),
            ),

            Hr::make(),

            Section::make(
                Button::make('Reset password')
                    ->href('https://example.com')
            ),

            Text::make('Copyright 2025 Acme Corp.')
        )
    )
);

$renderer = new HtmlRenderer(); // [!code ++]

echo $renderer->render($template); // [!code ++]
```

::: warning
Components should not render themselves directly. The renderer processes the component tree to generate HTML output, maintaining separation between component structure and rendering logic.
:::

## Styling components

Apply styles using the `style()` method on components that implement the `StylesInterface`. The template supports Atomic CSS methodology for styling, similar to Tailwind CSS's utility-first approach:

```php
use Flowframe\Brief\Components\Button;
use Flowframe\Brief\Support\Atomic;
use Flowframe\Brief\Support\Atomic\Presets\DefaultPreset;

$a = Atomic::make([new DefaultPreset]);

Button::make('Click me')
    ->style($a('bg-blue-600 text-white px-3 py-2 rounded-lg font-medium'));
```

This pattern enables consistent styling through predefined utility classes. For implementation details, see [Atomic](/docs/styling/atomic).
