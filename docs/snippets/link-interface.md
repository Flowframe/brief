### Link Interface

Allows a component to link to an url.

```php
interface LinkInterface
{
    /**
     * Set the link href.
     */
    public function href(string $href): static;

    /**
     * Set the link target.
     */
    public function target(string $target): static;

    /**
     * Get the link href.
     */
    public function getHref(): string;
}
```
