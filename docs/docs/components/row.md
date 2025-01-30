# Row

Display a row that separates content areas horizontally in your email.

## Example

```php
use Flowframe\Brief\Components\Html;
use Flowframe\Brief\Components\Body;
use Flowframe\Brief\Components\Row;
use Flowframe\Brief\Components\Column;

Html::make(
    Body::make(
        Row::make(
            Column::make('First'),
            Column::make('Second')
        )
    )
);
```

## Implements

<!-- @include: @/snippets/component-interface.md -->
