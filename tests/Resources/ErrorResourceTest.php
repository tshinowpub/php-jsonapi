<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Tests\Resources;

use PHPUnit\Framework\TestCase;
use Tshinow\JsonApi\Resources\ErrorResource;

class ErrorResourceTest extends TestCase
{
    /**
     * @test
     */
    public function testToArray()
    {
        $status = 400;
        $code   = 'ERROR';
        $title  = 'Bad Request';
        $detail = 'Id must be instance of integer.';

        $resource = new ErrorResource([
            'status'  => $status,
            'code'    => $code,
            'title'   => $title,
            'detail'  => $detail,
        ]);

        $arrayResource = $resource->toArray();

        $this->assertSame($arrayResource['status'], $status);
        $this->assertSame($arrayResource['code'], $code);
        $this->assertSame($arrayResource['title'], $title);
        $this->assertSame($arrayResource['detail'], $detail);
    }
}