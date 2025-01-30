# Rendering HTML

To render templates, use the `HtmlRenderer`:

```php
use Flowframe\Components\Html;
use Flowframe\Brief\Renderers\HtmlRenderer;

$template = Html::make(
    // ...
);

$renderer = new HtmlRenderer();

$renderer->render($template);
```

::: warning
Components should not render themselves directly. The renderer processes the component tree to generate HTML output, maintaining separation between component structure and rendering logic.
:::
