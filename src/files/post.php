<?php

use \DjinnDev\RequestHandler\Post;

/**
 * Returns instance of class.
 * 
 * @return \DjinnDev\RequestHandler\Post
 */
function requestPost(): Post
{
    return Post::getInstance();
}

/**
 * Returns value of specific location in request.
 * 
 * @param string|int ...$inputName
 * @return mixed
 */
function requestPostInputValue(string|int ...$inputName)
{
    $class = requestPost();
    return $class->getInput(...$inputName);
}

/**
 * Check if specific location in request has a value
 * 
 * @param string|int ...$inputName
 * @return bool
 */
function requestPostHasInput(string|int ...$inputName): bool
{
    $class = requestPost();
    return $class->hasInput(...$inputName);
}

/**
 * Get type of value for specific location in request
 * 
 * @param string|int ...$inputName
 * @return string
 */
function requestPostInputType(string|int ...$inputName): string
{
    $class = requestPost();
    return $class->getInputType(...$inputName);
}