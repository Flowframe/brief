# Rendering basics

To get started with rendering we recommend to use the `RendererFactory` instead of using both `HtmlRenderer` and `TextRenderer`.

```php
use Flowframe\Brief\Components\Html;
use Flowframe\Brief\Renderers\HtmlRenderer;
use Flowframe\Brief\Renderers\TextRenderer;
use Flowframe\Brief\Renderers\RendererFactory;

$renderer = new RendererFactory(
    new HtmlRenderer,
    new TextRenderer,
);

$template = Html::make(
    // ...
);

$html = $renderer->toHtml($template);

$text = $renderer->toText($template);
```

## Binding to a service container

Most popular frameworks come with a service container, here you can easily bind a concrete implementation to an interface. This keeps the configuration all in one place and avoids code duplication. Below is an example in Laravel:

```php
use Flowframe\Brief\Renderers\HtmlRenderer;
use Flowframe\Brief\Renderers\TextRenderer;
use Flowframe\Brief\Renderers\RendererFactory;
use Flowframe\Brief\Renderers\Contracts\RendererFactoryInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(RendererFactoryInterface::class, function () {
            return new RendererFactory(
                new HtmlRenderer,
                new TextRenderer,
            );
        });
    }
}
```

Now you can inject `RendererFactoryInterface` in constructors or methods and easily render templates. Below is an example of how you can use it:

```php
class OrderShipped extends Mailable
{
    public function __construct(
        private Order $order,
        private ComponentInterface $template,
    ) {}

    public function content(RendererFactoryInterface $renderer): Content
    {
        return new Content(
            html: $renderer->toHtml($this->template),
            text: $renderer->toText($this->template),
        );
    }
}
```
