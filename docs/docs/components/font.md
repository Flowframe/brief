# Font

A layout component that centers your content horizontally on a breaking point.

## Example

```php
use Flowframe\Brief\Components\Html;
use Flowframe\Brief\Components\Head;
use Flowframe\Brief\Components\Font;

Html::make(
    Head::make(
        Font::make('Roboto', 400, 'https://...')
            ->format('woff2')
    )
);
```

## Methods

### `make(string $family, int $weight, string $url): static`

Create an instance specifying the font family, weight & url.

### `format(string $format): static`

Specify the font format such as woff2.

## Implements

<!-- @include: @/snippets/void-component-interface.md -->
