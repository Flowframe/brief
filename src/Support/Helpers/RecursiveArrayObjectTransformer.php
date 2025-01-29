<?php

declare(strict_types=1);

namespace Flowframe\Brief\Support\Helpers;

final class RecursiveArrayObjectTransformer
{
    public function toObject(array $array): object
    {
        return (object) array_map(function (mixed $value) {
            return is_array($value) ? $this->toObject($value) : $value;
        }, $array);
    }

    public function toArray(object $object): array
    {
        return array_map(function (mixed $value) {
            return is_object($value) ? $this->toArray($value) : $value;
        }, (array) $object);
    }
}
