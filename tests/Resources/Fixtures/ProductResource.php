<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Tests\Resources\Fixtures;

use Tshinow\JsonApi\Resources\Resource;

class ProductResource extends Resource
{
    const TYPE = 'product';

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $resource = [
            'type'       => self::TYPE,
            'id'         => $this->resource->getId(),
            'attributes' => [
                'name' => $this->resource->getName(),
            ]
        ];

        $relationships = [];
        if (isset($this->with['stock'])) {
            $stockResource = $this->with['stock'];

            $relationships['stock'] = [
                'data' => [
                    'type' => StockResource::TYPE,
                    'id'   => $stockResource->resource()->getId(),
                ],
            ];
        }

        if (count($relationships) > 0) {
            $resource['relationships'] = $relationships;
        }

        return $resource;
    }
}