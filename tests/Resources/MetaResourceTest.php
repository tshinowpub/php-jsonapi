<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Tests\Resources;

use PHPUnit\Framework\TestCase;
use Tshinow\JsonApi\Tests\Resources\Fixtures\MetaResourceFixture;

class MetaResourceTest extends TestCase
{
    /**
     * @test
     */
    public function testToArray()
    {
        $resource = new MetaResourceFixture();

        $arrayResource = $resource->toArray();

        $this->assertSame($arrayResource['totalPage'], 1);
    }
}