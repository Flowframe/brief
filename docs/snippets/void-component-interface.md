### Void Component Interface

Allows a components to render HTML without children. Useful for components such as an `img` or `hr`.

```php
interface VoidComponentInterface
{
    /**
     * Render the component.
     */
    public function render(): string;
}
```
