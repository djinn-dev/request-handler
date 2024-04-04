<?php

use \DjinnDev\RequestHandler\Xml;

/**
 * Returns instance of class.
 * 
 * @return \DjinnDev\RequestHandler\Xml
 */
function requestXml(): Xml
{
    return Xml::getInstance();
}

/**
 * Returns value of specific location in request.
 * 
 * @param string|int ...$inputName
 * @return mixed
 */
function requestXmlInputValue(string|int ...$inputName)
{
    $class = requestXml();
    return $class->getInput(...$inputName);
}

/**
 * Check if specific location in request has a value
 * 
 * @param string|int ...$inputName
 * @return bool
 */
function requestXmlHasInput(string|int ...$inputName): bool
{
    $class = requestXml();
    return $class->hasInput(...$inputName);
}

/**
 * Get type of value for specific location in request
 * 
 * @param string|int ...$inputName
 * @return string
 */
function requestXmlInputType(string|int ...$inputName): string
{
    $class = requestXml();
    return $class->getInputType(...$inputName);
}