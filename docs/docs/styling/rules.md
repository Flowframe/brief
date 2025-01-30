# Rules

With rules you can generate CSS.

## Static rules

Static rules are commonly used when you need to return a static value which doesn't rely on regex matches:

```php
new Rule('/^bg-hotpink$/', new Styles([
    'background-color' => 'hotpink',
]));
```

This will always return `background-color: hotpink` when it matches `bg-hotpink`.

## Dynamic rules

You can leverage dynamic rules to generate CSS on the fly or to create utility classes based on theme values.

The first example shows how to create utility classes based on a theme:

```php
new Rule(
    '/^bg-(.*)$/',
    function (Theme $theme, $matches) {
        $path = str_replace('-', '.', $matches[1]);

        $value = $theme->get("colors.{$matches[1]}")
            ?? $theme->get("colors.{$path}")
            ?? $matches[1];

        return new Styles([
            'background-color' => $value,
        ]);
    },
);
```

The second example shows how to create a dynamic scale class for padding:

```php
new Rule(
    '/^padding-(.*)$/',
    function (Theme $theme, $matches) {
        $value = str_replace('-', '.', $matches[1]);

        return new Styles([
            'padding' => $matches[1] * 4,
        ]);
    },
);
```

::: tip NOTE
Entering `padding-4` would result into `padding: 16px` since it's multiplying 4 by 4.
:::
