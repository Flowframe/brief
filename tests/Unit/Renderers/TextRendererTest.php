<?php

declare(strict_types=1);

use Flowframe\Brief\Components\Body;
use Flowframe\Brief\Components\Button;
use Flowframe\Brief\Components\Container;
use Flowframe\Brief\Components\Head;
use Flowframe\Brief\Components\Hr;
use Flowframe\Brief\Components\Html;
use Flowframe\Brief\Components\Section;
use Flowframe\Brief\Components\Text;
use Flowframe\Brief\Renderers\TextRenderer;

test('it can render text', function (bool $conditional) {
    $renderer = new TextRenderer;

    $text = $renderer->render(
        Html::make(
            Head::make(),

            Body::make(
                Container::make(
                    Section::make(
                        Text::make('Foo'),

                        Hr::make(),
                    ),

                    Button::make('Click me')
                        ->href('https://example.com'),

                    Text::make(function () use ($conditional) {
                        if ($conditional) {
                            return 'Foo';
                        }

                        return 'Bar';
                    }),

                    Section::make(
                        Text::make('Foo'),

                        Hr::make(),

                        fn () => Text::make('Bar'),
                    )
                )
            )
        )
    );

    expect($text)->toMatchSnapshot();
})->with([true, false]);
