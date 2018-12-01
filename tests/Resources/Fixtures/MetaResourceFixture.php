<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Tests\Resources\Fixtures;

use Tshinow\JsonApi\Resources\MetaResource;

class MetaResourceFixture extends MetaResource
{
    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'totalPage' => 1,
        ];
    }
}