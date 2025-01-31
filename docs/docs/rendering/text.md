# Rendering plain text

To render templates to plain text, use the `TextRenderer`:

```php
use Flowframe\Brief\Components\Html;
use Flowframe\Brief\Renderers\TextRenderer;

$template = Html::make(
    // ...
);

$renderer = new TextRenderer();

$renderer->render($template);
```
