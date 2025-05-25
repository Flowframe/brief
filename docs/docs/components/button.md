# Button

A link that is styled to look like a button.

## Example

```php
use Flowframe\Brief\Components\Html;
use Flowframe\Brief\Components\Body;
use Flowframe\Brief\Components\Button;

Html::make(
    Body::make(
        Button::make('Click me!')
            ->href('https://klopstra.me')
            ->target('_blank')
    )
);
```

## Implements

<!-- @include: @/snippets/link-interface.md -->

<!-- @include: @/snippets/styles-interface.md -->

<!-- @include: @/snippets/component-interface.md -->
