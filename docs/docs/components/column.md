# Column

Display a column that separates content areas vertically in your email. A column needs to be used in combination with a Row component.

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

<!-- @include: @/snippets/styles-interface.md -->

<!-- @include: @/snippets/component-interface.md -->
