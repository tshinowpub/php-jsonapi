<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Tests\Resources;

use PHPUnit\Framework\TestCase;
use Tshinow\JsonApi\Resources\JsonApiObjectResource;

class JsonApiObjectResourceTest extends TestCase
{
    /**
     * @test
     */
    public function testToArray()
    {
        $resource = new JsonApiObjectResource();

        $arrayResource = $resource->toArray();

        $this->assertSame($arrayResource['version'], '1.0');
    }
}