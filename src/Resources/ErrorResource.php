<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Resources;

/**
 * Error Resource
 *
 * @see https://jsonapi.org/format/#error-objects
 */
class ErrorResource extends JsonResource
{
    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $arrayResource = [];

        $arrayResource['status'] = $this->resource['status'];

        if (isset($this->resource['code'])) {
            $arrayResource['code'] = $this->resource['code'];
        }

        $arrayResource['title'] = $this->resource['title'];

        if (isset($this->resource['detail'])) {
            $arrayResource['detail'] = $this->resource['detail'];
        }

        return $arrayResource;
    }
}