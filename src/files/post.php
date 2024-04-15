<?php

use \DjinnDev\RequestHandler\Post;

if(!function_exists('postRequest'))
{
    /**
     * Returns instance of class.
     * 
     * @return \DjinnDev\RequestHandler\Post
     */
    function postRequest(): Post
    {
        return Post::getInstance();
    }
}

if(!function_exists('postRequestInputValue'))
{
    /**
     * Returns value of specific location in request.
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return mixed
     */
    function postRequestInputValue(string|int $index, string|int ...$indexes)
    {
        return Post::getInstance()->getInput($index, ...$indexes);
    }
}

if(!function_exists('postRequestHasInput'))
{
    /**
     * Check if specific location in request has a value
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return bool
     */
    function postRequestHasInput(string|int $index, string|int ...$indexes): bool
    {
        return Post::getInstance()->hasInput($index, ...$indexes);
    }
}

if(!function_exists('postRequestInputType'))
{
    /**
     * Get type of value for specific location in request
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return string
     */
    function postRequestInputType(string|int $index, string|int ...$indexes): string
    {
        return Post::getInstance()->getInputType($index, ...$indexes);
    }
}