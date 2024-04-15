<?php

use \DjinnDev\RequestHandler\Cli;

if(!function_exists('cliRequest'))
{
    /**
     * Returns instance of class.
     * 
     * @return \DjinnDev\RequestHandler\Cli
     */
    function cliRequest(): Cli
    {
        return Cli::getInstance();
    }
}

if(!function_exists('cliRequestInputValue'))
{
    /**
     * Returns value of specific location in request.
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return mixed
     */
    function cliRequestInputValue(string|int $index, string|int ...$indexes)
    {
        return Cli::getInstance()->getInput($index, ...$indexes);
    }
}

if(!function_exists('cliRequestHasInput'))
{
    /**
     * Check if specific location in request has a value
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return bool
     */
    function cliRequestHasInput(string|int $index, string|int ...$indexes): bool
    {
        return Cli::getInstance()->hasInput($index, ...$indexes);
    }
}

if(!function_exists('cliRequestInputType'))
{
    /**
     * Get type of value for specific location in request
     * 
     * @param string|int $index
     * @param string|int ...$indexes
     * @return string
     */
    function cliRequestInputType(string|int $index, string|int ...$indexes): string
    {
        return Cli::getInstance()->getInputType($index, ...$indexes);
    }
}