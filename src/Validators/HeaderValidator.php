<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Validators;

/**
 * Check Json API Headers
 */
class HeaderValidator
{
    const JSON_API_CONTENT_TYPE = 'application/vnd.api+json';

    /**
     * @param string|null $accept
     *
     * @return bool
     */
    public function validateAcceptType(string $accept = null): bool
    {
        if ($accept === null) return false;
        return strpos($accept, self::JSON_API_CONTENT_TYPE) !== false
            || strpos($accept, '*/*') !== false
            || strpos($accept, 'application/*') !== false;
    }

    /**
     * @param string $method
     * @param string|null $contentType
     *
     * @return bool
     */
    public function validateJsonApiContentType(string $method, string $contentType = null): bool
    {
        if (in_array($method, $this->noContentMethods())) return true;
        if (!is_null($contentType) && strpos($contentType, self::JSON_API_CONTENT_TYPE) !== false) return true;
        return false;
    }

    /**
     * @return array
     */
    private function noContentMethods(): array
    {
        return [
            'GET',
            'HEAD',
            'OPTIONS',
            'TRACE',
        ];
    }
}