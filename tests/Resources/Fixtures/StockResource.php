<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Tests\Resources\Fixtures;

use Tshinow\JsonApi\Resources\Resource;

class StockResource extends Resource
{
    const TYPE = 'stock';

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'type' => self::TYPE,
            'id'   => $this->resource->getId(),
            'attributes' => [
                'quantity' => $this->resource->getQuantity(),
            ]
        ];
    }
}