<?php

use \DjinnDev\RequestHandler\Post;

/**
 * Returns instance of class.
 * 
 * @return \DjinnDev\RequestHandler\Post
 */
function postRequest(): Post
{
    return Post::getInstance();
}

/**
 * Returns value of specific location in request.
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return mixed
 */
function postRequestInputValue(string|int $index, string|int ...$indexes)
{
    $class = postRequest();
    return $class->getInput($index, ...$indexes);
}

/**
 * Check if specific location in request has a value
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return bool
 */
function postRequestHasInput(string|int $index, string|int ...$indexes): bool
{
    $class = postRequest();
    return $class->hasInput($index, ...$indexes);
}

/**
 * Get type of value for specific location in request
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return string
 */
function postRequestInputType(string|int $index, string|int ...$indexes): string
{
    $class = postRequest();
    return $class->getInputType($index, ...$indexes);
}