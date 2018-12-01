<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Tests\Builders;

use PHPUnit\Framework\TestCase;
use Tshinow\JsonApi\Builders\ResourceBuilder;
use Tshinow\JsonApi\Builders\ResourceBuilderInterface;
use Tshinow\JsonApi\Resources\JsonApiObjectResource;
use Tshinow\JsonApi\Tests\Resources\Fixtures\MetaResourceFixture;
use Tshinow\JsonApi\Tests\Resources\Fixtures\Product;
use Tshinow\JsonApi\Tests\Resources\Fixtures\ProductResource;
use Tshinow\JsonApi\Tests\Resources\Fixtures\Stock;
use Tshinow\JsonApi\Tests\Resources\Fixtures\StockResource;

class ResourceBuilderTest extends TestCase
{
    /**
     * @var ResourceBuilderInterface
     */
    private $builder;

    protected function setUp()
    {
        $this->builder = new ResourceBuilder();

        parent::setUp();
    }

    /**
     * @test
     */
    public function testResponse()
    {
        $product = new Product();

        $product
            ->setId(1)
            ->setName('テスト商品');

        $productResource = new ProductResource($product);
        $productResource->addWith(StockResource::TYPE, $this->stockResource());

        $response = $this
            ->builder
            ->add($productResource)
            ->add($productResource)
            ->setMeta(new MetaResourceFixture())
            ->addIncluded($this->stockResource())
            ->addIncluded($this->stockResource())
            ->response();

        $resource = $response->resource();

        $this->assertTrue($resource['meta'] instanceof MetaResourceFixture);
        $this->assertTrue(count($resource['data']) === 2);
        $this->assertTrue($resource['jsonapi'] instanceof JsonApiObjectResource);
        $this->assertTrue(count($resource['included']) === 2);
    }

    /**
     * @return StockResource
     */
    private function stockResource(): StockResource
    {
        $stock = new Stock();

        $stock
            ->setId(1)
            ->setQuantity(1);

        return new StockResource($stock);
    }
}