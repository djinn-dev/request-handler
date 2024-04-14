<?php

use \DjinnDev\RequestHandler\Xml;

if(!function_exists('xmlRequest'))
{
    /**
     * Returns instance of class.
     * 
     * @return \DjinnDev\RequestHandler\Xml
     */
    function xmlRequest(): Xml
    {
        return Xml::getInstance();
    }
}

if(!function_exists('xmlRequestInputValue'))
{
    /**
     * Returns value of specific location in request.
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return mixed
     */
    function xmlRequestInputValue(string|int $index, string|int ...$indexes)
    {
        return Xml::getInstance()->getInput($index, ...$indexes);
    }
}

if(!function_exists('xmlRequestHasInput'))
{
    /**
     * Check if specific location in request has a value
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return bool
     */
    function xmlRequestHasInput(string|int $index, string|int ...$indexes): bool
    {
        return Xml::getInstance()->hasInput($index, ...$indexes);
    }
}

if(!function_exists('xmlRequestInputType'))
{
    /**
     * Get type of value for specific location in request
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return string
     */
    function xmlRequestInputType(string|int $index, string|int ...$indexes): string
    {
        return Xml::getInstance()->getInputType($index, ...$indexes);
    }
}