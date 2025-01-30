# Img

Display an image in your email.

## Example

```php
use Flowframe\Brief\Components\Html;
use Flowframe\Brief\Components\Body;
use Flowframe\Brief\Components\Img;

Html::make(
    Body::make(
        Img::make('https://example.com/image.png', 'Image')
            ->width(160)
            ->height(120)
    )
);
```

## Methods

### `make(string $src, string $alt = ''): static`

Create a new instance using a src url and alt text.

### `width(int $width): static`

Specify the image width.

### `height(int $height): static`

Specify the image height.

### `size(int $size): static`

Specify the image width and height.

## Implements

<!-- @include: @/snippets/styles-interface.md -->

<!-- @include: @/snippets/void-component-interface.md -->
