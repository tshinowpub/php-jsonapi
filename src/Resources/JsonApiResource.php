<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Resources;

/**
 * JsonApiResource
 *
 * @see https://jsonapi.org/format/#document-jsonapi-object
 */
class JsonApiResource extends JsonResource
{
    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $arrayResource = [];

        if (isset($this->resource['meta'])) {
            $arrayResource['meta'] = $this->resource['meta'];
        }

        if (isset($this->resource['jsonapi'])) {
            $arrayResource['jsonapi'] = $this->resource['jsonapi'];
        }

        if (isset($this->resource['errors'])) {
            $arrayResource['errors'] = $this->resource['errors'];
        }

        if (isset($this->resource['data'])) {
            $arrayResource['data'] = $this->resource['data'];
        }

        if (isset($this->resource['included'])) {
            $arrayResource['included'] = $this->resource['included'];
        }

        return $arrayResource;
    }
}