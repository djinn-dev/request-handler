<?php

namespace DjinnDev\RequestHandler\Traits;

trait PhpInput
{
    /**
	 * Protected.
	 * Function returns trimmed content of php://input.
	 * 
	 * @return string
	 */
	protected function _getPhpInputContents(): string
	{
		// pull data from input
		$input = file_get_contents('php://input');
		// basic sanity
		return trim($input);
	}
}