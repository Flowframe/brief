### Component Interface

Allows a components to have childeren and render HTML.

```php
interface ComponentInterface
{
    /**
     * Make a new component instance.
     */
    public static function make(ComponentInterface|VoidComponentInterface|string ...$children): static;

    /**
     * Get the children of the component.
     */
    public function getChildren(): array;

    /**
     * Render the component.
     */
    public function render(?string $slot = null): string;
}
```
