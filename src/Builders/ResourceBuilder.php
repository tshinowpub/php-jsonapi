<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Builders;

use Tshinow\JsonApi\Resources\MetaResource;
use Tshinow\JsonApi\Resources\JsonApiObjectResource;
use Tshinow\JsonApi\Resources\JsonApiResource;
use Tshinow\JsonApi\Resources\Resource;

/**
 * Build JsonAPI Response.
 */
class ResourceBuilder implements ResourceBuilderInterface
{
    /**
     * @var MetaResource|null
     */
    private $meta = null;

    /**
     * @var array
     */
    private $resources = [];

    /**
     * @var array
     */
    private $included = [];

    public function __construct()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function add(Resource $resource): ResourceBuilderInterface
    {
        $this->resources[] = $resource;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addIncluded(Resource $resource): ResourceBuilderInterface
    {
        $this->included[] = $resource;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setMeta(MetaResource $resource): ResourceBuilderInterface
    {
        $this->meta = $resource;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function clearMeta(): ResourceBuilderInterface
    {
        $this->meta = null;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function clear(): ResourceBuilderInterface
    {
        $this->resources = [];

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function response(): JsonApiResource
    {
        return new JsonApiResource($this->build($this->resources));
    }

    /**
     * {@inheritdoc}
     */
    public function singleResponse(): JsonApiResource
    {
        return new JsonApiResource(
            (current($this->resources) !== false) ? current($this->resources) : null
        );
    }

    /**
     * {@inheritdoc}
     */
    public function clearIncluded(): ResourceBuilderInterface
    {
        $this->included = [];

        return $this;
    }

    /**
     * @param array
     *
     * @return array
     */
    private function build(array $jsonResource): array
    {
        $resource = [];
        if (isset($this->meta)) {
            $resource['meta'] = $this->meta;
        }

        $resource['jsonapi']  = new JsonApiObjectResource();
        $resource['data']     = $jsonResource;

        if (count($this->included) > 0) {
            $resource['included'] = $this->included;
        }

        return $resource;
    }
}