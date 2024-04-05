<?php

use \DjinnDev\RequestHandler\Json;

/**
 * Returns instance of class.
 * 
 * @return \DjinnDev\RequestHandler\Json
 */
function requestJson(): Json
{
    return Json::getInstance();
}

/**
 * Returns value of specific location in request.
 * 
 * @param string|int ...$inputName
 * @return mixed
 */
function requestJsonInputValue(string|int ...$inputName)
{
    $class = requestJson();
    return $class->getInput(...$inputName);
}

/**
 * Check if specific location in request has a value
 * 
 * @param string|int ...$inputName
 * @return bool
 */
function requestJsonHasInput(string|int ...$inputName): bool
{
    $class = requestJson();
    return $class->hasInput(...$inputName);
}

/**
 * Get type of value for specific location in request
 * 
 * @param string|int ...$inputName
 * @return string
 */
function requestJsonInputType(string|int ...$inputName): string
{
    $class = requestJson();
    return $class->getInputType(...$inputName);
}