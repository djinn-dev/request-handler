<?php

use \DjinnDev\RequestHandler\Xml;

/**
 * Returns instance of class.
 * 
 * @return \DjinnDev\RequestHandler\Xml
 */
function xmlRequest(): Xml
{
    return Xml::getInstance();
}

/**
 * Returns value of specific location in request.
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return mixed
 */
function xmlRequestInputValue(string|int $index, string|int ...$indexes)
{
    $class = xmlRequest();
    return $class->getInput($index, ...$indexes);
}

/**
 * Check if specific location in request has a value
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return bool
 */
function xmlRequestHasInput(string|int $index, string|int ...$indexes): bool
{
    $class = xmlRequest();
    return $class->hasInput($index, ...$indexes);
}

/**
 * Get type of value for specific location in request
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return string
 */
function xmlRequestInputType(string|int $index, string|int ...$indexes): string
{
    $class = xmlRequest();
    return $class->getInputType($index, ...$indexes);
}