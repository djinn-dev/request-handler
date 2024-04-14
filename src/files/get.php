<?php

use \DjinnDev\RequestHandler\Get;

/**
 * Returns instance of class.
 * 
 * @return \DjinnDev\RequestHandler\Get
 */
function getRequest(): Get
{
    return Get::getInstance();
}

/**
 * Returns value of specific location in request.
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return mixed
 */
function getRequestInputValue(string|int $index, string|int ...$indexes)
{
    $class = getRequest();
    return $class->getInput($index, ...$indexes);
}

/**
 * Check if specific location in request has a value
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return bool
 */
function getRequestHasInput(string|int $index, string|int ...$indexes): bool
{
    $class = getRequest();
    return $class->hasInput($index, ...$indexes);
}

/**
 * Get type of value for specific location in request
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return string
 */
function getRequestInputType(string|int $index, string|int ...$indexes): string
{
    $class = getRequest();
    return $class->getInputType($index, ...$indexes);
}