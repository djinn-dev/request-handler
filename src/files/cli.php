<?php

use \DjinnDev\RequestHandler\Cli;

/**
 * Returns instance of class.
 * 
 * @return \DjinnDev\RequestHandler\Cli
 */
function requestCli(): Cli
{
    return Cli::getInstance();
}

/**
 * Returns value of specific location in request.
 * 
 * @param string|int ...$inputName
 * @return mixed
 */
function requestCliInputValue(string|int ...$inputName)
{
    $class = requestCli();
    return $class->getInput(...$inputName);
}

/**
 * Check if specific location in request has a value
 * 
 * @param string|int ...$inputName
 * @return bool
 */
function requestCliHasInput(string|int ...$inputName): bool
{
    $class = requestCli();
    return $class->hasInput(...$inputName);
}

/**
 * Get type of value for specific location in request
 * 
 * @param string|int ...$inputName
 * @return string
 */
function requestCliInputType(string|int ...$inputName): string
{
    $class = requestCli();
    return $class->getInputType(...$inputName);
}