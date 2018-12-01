<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Resources;

/**
 * Json API Object Resource
 *
 * @see https://jsonapi.org/format/#document-jsonapi-object
 */
class JsonApiObjectResource extends Resource
{
    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'version' => '1.0'
        ];
    }
}