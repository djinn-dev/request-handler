<?php

use \DjinnDev\RequestHandler\Url;

/**
 * Returns instance of class.
 * 
 * @return \DjinnDev\RequestHandler\Url
 */
function urlRequest(): Url
{
    return Url::getInstance();
}

/**
 * Get request schema
 * 
 * @return string
 */
function urlRequestSchema(): string
{
    $class = urlRequest();
    return $class->getSchema();
}

/**
 * Get request host/domain
 * 
 * @return string
 */
function urlRequestHost(): string
{
    $class = urlRequest();
    return $class->getHost();
}

/**
 * Get request port
 * 
 * @return int
 */
function urlRequestPort(): int
{
    $class = urlRequest();
    return $class->getPort();
}

/**
 * Get request path/uri
 * 
 * @return string
 */
function urlRequestPath(): string
{
    $class = urlRequest();
    return $class->getPath();
}

/**
 * Get full request url
 * 
 * @param bool $withQueryString
 * @param bool $includeImpliedPorts
 * @return string
 */
function urlRequestFull(bool $withQueryString = true, bool $includeImpliedPorts = false): string
{
    $class = urlRequest();
    return $class->getFullUrl($withQueryString, $includeImpliedPorts);
}