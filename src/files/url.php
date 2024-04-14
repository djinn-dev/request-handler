<?php

use \DjinnDev\RequestHandler\Url;

if(!function_exists('urlRequest'))
{
    /**
     * Returns instance of class.
     * 
     * @return \DjinnDev\RequestHandler\Url
     */
    function urlRequest(): Url
    {
        return Url::getInstance();
    }
}

if(!function_exists('urlRequestSchema'))
{
    /**
     * Get request schema
     * 
     * @return string
     */
    function urlRequestSchema(): string
    {
        return Url::getInstance()->getSchema();
    }
}

if(!function_exists('urlRequestHost'))
{
    /**
     * Get request host/domain
     * 
     * @return string
     */
    function urlRequestHost(): string
    {
        return Url::getInstance()->getHost();
    }
}

if(!function_exists('urlRequestPort'))
{
    /**
     * Get request port
     * 
     * @return int
     */
    function urlRequestPort(): int
    {
        return Url::getInstance()->getPort();
    }
}

if(!function_exists('urlRequestPath'))
{
    /**
     * Get request path/uri
     * 
     * @return string
     */
    function urlRequestPath(): string
    {
        return Url::getInstance()->getPath();
    }
}

if(!function_exists('urlRequestFull'))
{
    /**
     * Get full request url
     * 
     * @param bool $withQueryString
     * @param bool $includeImpliedPorts
     * @return string
     */
    function urlRequestFull(bool $withQueryString = true, bool $includeImpliedPorts = false): string
    {
        return Url::getInstance()->getFullUrl($withQueryString, $includeImpliedPorts);
    }
}