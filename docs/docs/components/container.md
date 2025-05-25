# Container

A layout component that centers your content horizontally on a breaking point.

## Example

```php
use Flowframe\Brief\Components\Html;
use Flowframe\Brief\Components\Body;
use Flowframe\Brief\Components\Container;

Html::make(
    Body::make(
        Container::make('Slot')
    )
);
```

## Implements

<!-- @include: @/snippets/styles-interface.md -->

<!-- @include: @/snippets/component-interface.md -->
