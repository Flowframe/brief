# What is Brief?

A PHP library for building modern email templates.

::: info
Brief does not rely on Node.js or any other runtime, it's all written in PHP.
:::

## Overview

Brief is a component-driven email template engine designed to simplify email development while leveraging PHP's native capabilities. It combines best practices from email templates with the current day developer experience.

Aside from its components it also ships with a Tailwind CSS like engine (named Atomic) to create CSS utility classes on the fly.

```php
// Create a renderer
$renderer = new RendererFactory(
    new HtmlRenderer,
    new TextRenderer,
);

// Utilize Atomic for styling
$a = new Atomic([new DefaultPreset]);

// Create a template
$template = Html::make(
    Body::make(
        Container::make(
            Section::make(
                Text::make('Welcome to Brief')
                    ->style($a('text-xl font-bold')),

                Text::make('It is as simple as this.')
                    ->style($a('text-sm text-gray-600 mt-4')),

                Button::make('Getting started')
                    ->href('/get-started')
            )->style($a('p-6 bg-gray-50'))
        )
    )->style($a('text-gray-800'))
);

// Render to HTML
$renderer->toHtml($template);
```

## Credits

Brief is based on [react.email](https://react.email) and inspired by [mjml](https://mjml.io/). Without these open-source projects Brief likely wouldn't exist.
