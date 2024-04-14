<?php

use \DjinnDev\RequestHandler\Cookie;

/**
 * Returns instance of class.
 * 
 * @return \DjinnDev\RequestHandler\Cookie
 */
function cookieRequest(): Cookie
{
    return Cookie::getInstance();
}

/**
 * Returns value of specific location in request.
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return mixed
 */
function cookieRequestInputValue(string|int $index, string|int ...$indexes)
{
    $class = cookieRequest();
    return $class->getInput($index, ...$indexes);
}

/**
 * Check if specific location in request has a value
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return bool
 */
function cookieRequestHasInput(string|int $index, string|int ...$indexes): bool
{
    $class = cookieRequest();
    return $class->hasInput($index, ...$indexes);
}

/**
 * Get type of value for specific location in request
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return string
 */
function cookieRequestInputType(string|int $index, string|int ...$indexes): string
{
    $class = cookieRequest();
    return $class->getInputType($index, ...$indexes);
}