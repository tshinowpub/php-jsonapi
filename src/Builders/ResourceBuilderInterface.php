<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Builders;

use Tshinow\JsonApi\Resources\MetaResource;
use Tshinow\JsonApi\Resources\JsonApiResource;
use Tshinow\JsonApi\Resources\Resource;

interface ResourceBuilderInterface
{
    /**
     * @param Resource $resource
     *
     * @return ResourceBuilderInterface
     */
    public function add(Resource $resource): ResourceBuilderInterface;

    /**
     * @param Resource $resource
     *
     * @return ResourceBuilderInterface
     */
    public function addIncluded(Resource $resource): ResourceBuilderInterface;

    /**
     * @param MetaResource $resource
     *
     * @return ResourceBuilderInterface
     */
    public function setMeta(MetaResource $resource): ResourceBuilderInterface;

    /**
     * @return ResourceBuilderInterface
     */
    public function clear(): ResourceBuilderInterface;

    /**
     * @return ResourceBuilderInterface
*/
    public function clearMeta(): ResourceBuilderInterface;

    /**
     * @return ResourceBuilderInterface
     */
    public function clearIncluded(): ResourceBuilderInterface;

    /**
     * @return JsonApiResource
     */
    public function response(): JsonApiResource;

    /**
     * @return JsonApiResource
     */
    public function singleResponse(): JsonApiResource;
}