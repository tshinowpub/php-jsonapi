<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Builders;

use Tshinow\JsonApi\Resources\ErrorResource;
use Tshinow\JsonApi\Resources\JsonApiResource;

interface ErrorResourceBuilderInterface
{
    /**
     * @param ErrorResource $resource
     *
     * @return ErrorResourceBuilderInterface
     */
    public function add(ErrorResource $resource): ErrorResourceBuilderInterface;

    /**
     * @return JsonApiResource
     */
    public function response(): JsonApiResource;

    /**
     * @return ErrorResourceBuilderInterface
     */
    public function clear(): ErrorResourceBuilderInterface;
}