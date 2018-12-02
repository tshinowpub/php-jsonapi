<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Tests\Validators;

use PHPUnit\Framework\TestCase;
use Tshinow\JsonApi\Validators\HeaderValidator;

class HeaderValidatorTest extends TestCase
{
    /**
     * @var HeaderValidator
     */
    private $validator;

    public function setUp()
    {
        $this->validator = new HeaderValidator();
    }

    /**
     * @param string $accept
     * @param bool $result
     *
     * @dataProvider dataTestValidateAcceptType
     */
    public function testValidateAcceptType(string $accept, bool $result)
    {
        $this->assertSame($this->validator->validateAcceptType($accept), $result);
    }

    /**
     * @return array
     */
    public function dataTestValidateAcceptType(): array
    {
        return [
            [ '*/*', true ],
            [ 'application/*', true ],
            [ HeaderValidator::JSON_API_CONTENT_TYPE, true ],
            [ '*/*,' . HeaderValidator::JSON_API_CONTENT_TYPE, true ],
            [ 'application/xml,application/xhtml+xml,text/html;q=0.9, text/plain;q=0.8,image/png,*/*;q=0.5', true ],
            [ 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', true ],
            [ 'text/html, application/xhtml+xml, image/jxr, */*', true ],
            [ '', false ],
        ];
    }
    /**
     * @test
     */
    public function testValidateAcceptTypeNull()
    {
        $this->assertFalse($this->validator->validateAcceptType(null));
    }

    /**
     * @param string $method
     * @param string|null $contentType
     * @param bool $result
     *
     * @test
     * @dataProvider dataTestValidateJsonApiContentType
     */
    public function testValidateJsonApiContentType(string $method, string $contentType = null, bool $result)
    {
        $this->assertSame(
            $this->validator->validateJsonApiContentType($method, $contentType),
            $result
        );
    }

    /**
     * @return array
     */
    public function dataTestValidateJsonApiContentType(): array
    {
        return [
            /**
             * All Methods
             */
            ['GET', null, true],
            ['HEAD', null, true],
            ['POST', null, false],
            ['OPTIONS', null, true],
            ['PUT', null, false],
            ['DELETE', null, false],
            ['TRACE', null, true],
            ['PATCH', null, false],
            /**
             * Include Content Methods
             */
            ['POST', HeaderValidator::JSON_API_CONTENT_TYPE, true],
            ['PUT', HeaderValidator::JSON_API_CONTENT_TYPE, true],
            ['DELETE', HeaderValidator::JSON_API_CONTENT_TYPE, true],
            ['PATCH', HeaderValidator::JSON_API_CONTENT_TYPE, true],
            /**
             * Other Content Type
             */
            ['POST', 'text/plain', false],
            ['POST', 'application/json', false],
            ['POST', 'application/octet-stream', false],
        ];
    }

    /**
     * @test
     */
    public function testValidateJsonApiContentTypeNull()
    {
        $this->assertFalse($this->validator->validateJsonApiContentType('POST', null));
    }
}