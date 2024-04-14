<?php

use \DjinnDev\RequestHandler\Json;

/**
 * Returns instance of class.
 * 
 * @return \DjinnDev\RequestHandler\Json
 */
function jsonRequest(): Json
{
    return Json::getInstance();
}

/**
 * Returns value of specific location in request.
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return mixed
 */
function jsonRequestInputValue(string|int $index, string|int ...$indexes)
{
    $class = jsonRequest();
    return $class->getInput($index, ...$indexes);
}

/**
 * Check if specific location in request has a value
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return bool
 */
function jsonRequestHasInput(string|int $index, string|int ...$indexes): bool
{
    $class = jsonRequest();
    return $class->hasInput($index, ...$indexes);
}

/**
 * Get type of value for specific location in request
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return string
 */
function jsonRequestInputType(string|int $index, string|int ...$indexes): string
{
    $class = jsonRequest();
    return $class->getInputType($index, ...$indexes);
}