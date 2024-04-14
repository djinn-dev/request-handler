<?php

use \DjinnDev\RequestHandler\Cookie;

if(!function_exists('cookieRequest'))
{
    /**
     * Returns instance of class.
     * 
     * @return \DjinnDev\RequestHandler\Cookie
     */
    function cookieRequest(): Cookie
    {
        return Cookie::getInstance();
    }
}

if(!function_exists('cookieRequestInputValue'))
{
    /**
     * Returns value of specific location in request.
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return mixed
     */
    function cookieRequestInputValue(string|int $index, string|int ...$indexes)
    {
        return Cookie::getInstance()->getInput($index, ...$indexes);
    }
}

if(!function_exists('cookieRequestHasInput'))
{
    /**
     * Check if specific location in request has a value
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return bool
     */
    function cookieRequestHasInput(string|int $index, string|int ...$indexes): bool
    {
        return Cookie::getInstance()->hasInput($index, ...$indexes);
    }
}

if(!function_exists('cookieRequestInputType'))
{
    /**
     * Get type of value for specific location in request
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return string
     */
    function cookieRequestInputType(string|int $index, string|int ...$indexes): string
    {
        return Cookie::getInstance()->getInputType($index, ...$indexes);
    }
}