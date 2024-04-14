<?php

use \DjinnDev\RequestHandler\Get;

if(!function_exists('getRequest'))
{
    /**
     * Returns instance of class.
     * 
     * @return \DjinnDev\RequestHandler\Get
     */
    function getRequest(): Get
    {
        return Get::getInstance();
    }
}

if(!function_exists('getRequestInputValue'))
{
    /**
     * Returns value of specific location in request.
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return mixed
     */
    function getRequestInputValue(string|int $index, string|int ...$indexes)
    {
        return Get::getInstance()->getInput($index, ...$indexes);
    }
}

if(!function_exists('getRequestHasInput'))
{
    /**
     * Check if specific location in request has a value
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return bool
     */
    function getRequestHasInput(string|int $index, string|int ...$indexes): bool
    {
        return Get::getInstance()->hasInput($index, ...$indexes);
    }
}

if(!function_exists('getRequestInputType'))
{
    /**
     * Get type of value for specific location in request
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return string
     */
    function getRequestInputType(string|int $index, string|int ...$indexes): string
    {
        return Get::getInstance()->getInputType($index, ...$indexes);
    }
}