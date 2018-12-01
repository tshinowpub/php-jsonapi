<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Tests\Resources\Fixtures;

use Tshinow\JsonApi\Resources\Resource;

class ProductResource extends Resource
{
    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'id'   => $this->resource->getId(),
            'name' => $this->resource->getName(),
        ];
    }
}