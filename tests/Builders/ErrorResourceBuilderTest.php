<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Tests\Builders;

use PHPUnit\Framework\TestCase;
use Tshinow\JsonApi\Builders\ErrorResourceBuilder;
use Tshinow\JsonApi\Resources\ErrorResource;
use Tshinow\JsonApi\Resources\JsonApiObjectResource;

class ErrorResourceBuilderTest extends TestCase
{
    /**
     * @var ErrorResourceBuilder
     */
    private $builder;

    protected function setUp()
    {
        $this->builder = new ErrorResourceBuilder();

        parent::setUp();
    }

    /**
     * @test
     */
    public function testResponse()
    {
        $response = $this
            ->builder
            ->add(new ErrorResource())
            ->response();

        $resource = $response->toArray();

        $this->assertTrue(is_array($resource['errors']));
        $this->assertTrue($resource['jsonapi'] instanceof JsonApiObjectResource);
    }
}