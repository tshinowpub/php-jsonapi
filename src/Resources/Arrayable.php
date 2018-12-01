<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Resources;

/**
 * Can convert into an array.
 */
interface Arrayable
{
    /**
     * @return array
     */
    public function toArray(): array;
}