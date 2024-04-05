<?php

use \DjinnDev\RequestHandler\Url;

/**
 * Returns instance of class.
 * 
 * @return \DjinnDev\RequestHandler\Url
 */
function requestUrl(): Url
{
    return Url::getInstance();
}

/**
 * Get request path/uri
 * 
 * @return string
 */
function requestUrlSchema(): string
{
    $class = requestUrl();
    return $class->getSchema();
}

/**
 * Get request host/domain
 * 
 * @return string
 */
function requestUrlHost(): string
{
    $class = requestUrl();
    return $class->getHost();
}

/**
 * Get request port
 * 
 * @return int
 */
function requestUrlPort(): int
{
    $class = requestUrl();
    return $class->getPort();
}

/**
 * Get request path/uri
 * 
 * @return string
 */
function requestUrlPath(): string
{
    $class = requestUrl();
    return $class->getPath();
}

/**
 * Get full request url
 * 
 * @return string
 */
function requestUrlFull(): string
{
    $class = requestUrl();
    return $class->getFullUrl();
}