<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Resources;

/**
 * JsonAPI Resource
 */
abstract class JsonResource implements Arrayable, \JsonSerializable
{
    /**
     * @var mixed
     */
    protected $resource;

    /**
     * @var array
     */
    protected $with = [];

    /**
     * @param null $resource
     * @param array $with
     */
    public function __construct($resource = null, array $with = [])
    {
        $this->resource = $resource;
        $this->with     = $with;
    }

    /**
     * @return mixed
     */
    public function resource()
    {
        return $this->resource;
    }

    /**
     * @param string $key
     * @param $with
     *
     * @return $this
     */
    public function addWith(string $key, $with)
    {
        $this->with[$key] = $with;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * {@inheritdoc}
     */
    abstract public function toArray(): array;
}