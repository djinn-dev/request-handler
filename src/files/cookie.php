<?php

use \DjinnDev\RequestHandler\Cookie;

/**
 * Returns instance of class.
 * 
 * @return \DjinnDev\RequestHandler\Cookie
 */
function requestCookie(): Cookie
{
    return Cookie::getInstance();
}

/**
 * Returns value of specific location in request.
 * 
 * @param string|int ...$inputName
 * @return mixed
 */
function requestCookieInputValue(string|int ...$inputName)
{
    $class = requestCookie();
    return $class->getInput(...$inputName);
}

/**
 * Check if specific location in request has a value
 * 
 * @param string|int ...$inputName
 * @return bool
 */
function requestCookieHasInput(string|int ...$inputName): bool
{
    $class = requestCookie();
    return $class->hasInput(...$inputName);
}

/**
 * Get type of value for specific location in request
 * 
 * @param string|int ...$inputName
 * @return string
 */
function requestCookieInputType(string|int ...$inputName): string
{
    $class = requestCookie();
    return $class->getInputType(...$inputName);
}