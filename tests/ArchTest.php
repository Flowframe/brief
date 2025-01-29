<?php

declare(strict_types=1);

it('will not use debugging functions')
    ->expect(['var_dump'])
    ->not->toBeUsed();
