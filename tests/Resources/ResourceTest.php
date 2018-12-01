<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Tests\Resources;

use PHPUnit\Framework\TestCase;
use Tshinow\JsonApi\Tests\Resources\Fixtures\Product;
use Tshinow\JsonApi\Tests\Resources\Fixtures\ProductResource;
use Tshinow\JsonApi\Tests\Resources\Fixtures\ResourceFixture;

class ResourceTest extends TestCase
{
    /**
     * @test
     */
    public function testToArray()
    {
        $product = new Product();

        $product
            ->setId(1)
            ->setName('テスト商品');

        $resource = new ProductResource($product);

        $arrayResource = $resource->toArray();

        $this->assertSame($arrayResource['id'], $product->getId());
        $this->assertSame($arrayResource['attributes']['name'], $product->getName());
    }
}