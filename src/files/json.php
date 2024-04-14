<?php

use \DjinnDev\RequestHandler\Json;

if(!function_exists('jsonRequest'))
{
    /**
     * Returns instance of class.
     * 
     * @return \DjinnDev\RequestHandler\Json
     */
    function jsonRequest(): Json
    {
        return Json::getInstance();
    }
}

if(!function_exists('jsonRequestInputValue'))
{
    /**
     * Returns value of specific location in request.
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return mixed
     */
    function jsonRequestInputValue(string|int $index, string|int ...$indexes)
    {
        return Json::getInstance()->getInput($index, ...$indexes);
    }
}

if(!function_exists('jsonRequestHasInput'))
{
    /**
     * Check if specific location in request has a value
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return bool
     */
    function jsonRequestHasInput(string|int $index, string|int ...$indexes): bool
    {
        return Json::getInstance()->hasInput($index, ...$indexes);
    }
}

if(!function_exists('jsonRequestInputType'))
{
    /**
     * Get type of value for specific location in request
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return string
     */
    function jsonRequestInputType(string|int $index, string|int ...$indexes): string
    {
        return Json::getInstance()->getInputType($index, ...$indexes);
    }
}