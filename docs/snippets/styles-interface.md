### Styles Interface

Allows a component to receive styles.

```php
interface StylesInterface
{
    /**
     * Style the component.
     */
    public function style(Styles $styles): static;

    /**
     * Get the component styles.
     */
    public function getStyles(): Styles;
}
```
