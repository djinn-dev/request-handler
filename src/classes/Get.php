<?php

namespace DjinnDev\RequestHandler;

use \DjinnDev\RequestHandler\Abstracts\Input;
use \DjinnDev\ToolBasics\Traits\Instance;

class Get extends Input
{
    use Instance;

	/**
	 * Private.
	 * Run init parts for loading class.
	 */
	private function __construct()
	{
		$this->_rawData = $_GET;
	}
}