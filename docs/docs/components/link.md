# Link

A hyperlink to web pages, email addresses, or anything else a URL can address.

## Example

```php
use Flowframe\Brief\Components\Html;
use Flowframe\Brief\Components\Body;
use Flowframe\Brief\Components\Link;

Html::make(
    Body::make(
        Link::make('Click me!')
            ->href('https://klopstra.me')
            ->target('_blank')
    )
);
```

## Implements

<!-- @include: @/snippets/link-interface.md -->

<!-- @include: @/snippets/styles-interface.md -->

<!-- @include: @/snippets/component-interface.md -->
