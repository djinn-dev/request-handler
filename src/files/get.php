<?php

use \DjinnDev\RequestHandler\Get;

/**
 * Returns instance of class.
 * 
 * @return \DjinnDev\RequestHandler\Get
 */
function requestGet(): Get
{
    return Get::getInstance();
}

/**
 * Returns value of specific location in request.
 * 
 * @param string|int ...$inputName
 * @return mixed
 */
function requestGetInputValue(string|int ...$inputName)
{
    $class = requestGet();
    return $class->getInput(...$inputName);
}

/**
 * Check if specific location in request has a value
 * 
 * @param string|int ...$inputName
 * @return bool
 */
function requestGetHasInput(string|int ...$inputName): bool
{
    $class = requestGet();
    return $class->hasInput(...$inputName);
}

/**
 * Get type of value for specific location in request
 * 
 * @param string|int ...$inputName
 * @return string
 */
function requestGetInputType(string|int ...$inputName): string
{
    $class = requestGet();
    return $class->getInputType(...$inputName);
}