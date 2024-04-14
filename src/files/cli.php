<?php

use \DjinnDev\RequestHandler\Cli;

/**
 * Returns instance of class.
 * 
 * @return \DjinnDev\RequestHandler\Cli
 */
function cliRequest(): Cli
{
    return Cli::getInstance();
}

/**
 * Returns value of specific location in request.
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return mixed
 */
function cliRequestInputValue(string|int $index, string|int ...$indexes)
{
    $class = cliRequest();
    return $class->getInput($index, ...$indexes);
}

/**
 * Check if specific location in request has a value
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return bool
 */
function cliRequestHasInput(string|int $index, string|int ...$indexes): bool
{
    $class = cliRequest();
    return $class->hasInput($index, ...$indexes);
}

/**
 * Get type of value for specific location in request
 * 
 * @param string|int $index
 * @param string|int ...$indexes
 * @return string
 */
function cliRequestInputType(string|int $index, string|int ...$indexes): string
{
    $class = cliRequest();
    return $class->getInputType($index, ...$indexes);
}