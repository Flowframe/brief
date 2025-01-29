<?php

declare(strict_types=1);

namespace Flowframe\Brief\Support\Helpers;

class RecursiveObjectMerger
{
    public function merge(object $current, object $incoming): object
    {
        foreach ($incoming as $key => $value) {
            $newValue = is_object($value)
                ? $this->merge($current->{$key} ?? (object) [], $value)
                : $value;

            $current->{$key} = $newValue;
        }

        return $current;
    }
}
