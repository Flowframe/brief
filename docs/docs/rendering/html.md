# Rendering HTML

To render templates to HTML, use the `HtmlRenderer`:

```php
use Flowframe\Brief\Components\Html;
use Flowframe\Brief\Renderers\HtmlRenderer;

$template = Html::make(
    // ...
);

$renderer = new HtmlRenderer();

$renderer->render($template);
```
