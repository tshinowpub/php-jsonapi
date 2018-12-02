<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Builders;

use Tshinow\JsonApi\Resources\ErrorResource;
use Tshinow\JsonApi\Resources\JsonApiObjectResource;
use Tshinow\JsonApi\Resources\JsonApiResource;

class ErrorResourceBuilder implements ErrorResourceBuilderInterface
{
    /**
     * @var array
     */
    private $resources = [];

    public function __construct()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function add(ErrorResource $resource): ErrorResourceBuilderInterface
    {
        $this->resources[] = $resource;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function clear(): ErrorResourceBuilderInterface
    {
        $this->resources = [];

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function response(): JsonApiResource
    {
        return new JsonApiResource([
            'jsonapi' => new JsonApiObjectResource(),
            'errors'  => $this->resources
        ]);
    }
}