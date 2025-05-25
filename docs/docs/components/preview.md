# Preview

A preview text that will be displayed in the inbox of the recipient.

::: info
Email clients have this concept of “preview text” which gives insight into what’s inside the email before you open. A good practice is to keep that text under 90 characters.
:::

## Example

```php
use Flowframe\Brief\Components\Html;
use Flowframe\Brief\Components\Body;
use Flowframe\Brief\Components\Preview;

Html::make(
    Body::make(
        Preview::make('Email preview text')
    )
);
```

## Methods

### `make(string $text): static`

Make a new instance and specify the text.

### `getText(): string`

Get the text with added whitespace.

## Implements

<!-- @include: @/snippets/void-component-interface.md -->
