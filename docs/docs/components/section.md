# Section

Display a section that can also be formatted using rows and columns.

## Example

```php
use Flowframe\Brief\Components\Row;
use Flowframe\Brief\Components\Html;
use Flowframe\Brief\Components\Body;
use Flowframe\Brief\Components\Text;
use Flowframe\Brief\Components\Column;
use Flowframe\Brief\Components\Section;

Html::make(
    Body::make(
        Section::make(
            Text::make('Slot')
        ),

        Section::make(
            Row::make(
                Column::make('First'),
                Column::make('Second')
            )
        )
    )
);
```

## Implements

<!-- @include: @/snippets/styles-interface.md -->

<!-- @include: @/snippets/component-interface.md -->
