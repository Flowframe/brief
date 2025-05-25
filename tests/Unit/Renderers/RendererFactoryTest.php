<?php

declare(strict_types=1);

use Flowframe\Brief\Renderers\Contracts\RendererFactoryInterface;
use Flowframe\Brief\Renderers\HtmlRenderer;
use Flowframe\Brief\Renderers\RendererFactory;
use Flowframe\Brief\Renderers\TextRenderer;

test('it can be created', function () {
    $renderer = new RendererFactory(
        new HtmlRenderer,
        new TextRenderer,
    );

    expect($renderer)->toBeInstanceOf(RendererFactoryInterface::class);
});

test('it can render', function () {
    $renderer = new RendererFactory(
        new HtmlRenderer,
        new TextRenderer,
    );

    expect($renderer->toHtml('Bar'))->toEqual('Bar');
    expect($renderer->toText('Foo'))->toEqual('Foo');
});
