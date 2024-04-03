<?php

namespace DjinnDev\RequestHandler;

use \DjinnDev\RequestHandler\Abstracts\Input;
use \DjinnDev\RequestHandler\Traits\Instance;
use \DjinnDev\RequestHandler\Traits\PhpInput;

class Json extends Input
{
    use Instance, PhpInput;

	/**
	 * Private.
	 * Run init parts for loading class.
	 */
	private function __construct()
	{
		$input = $this->_getPhpInputContents();
		if(empty($input)) return;

		$json = json_decode($input, true);
		if(!is_array($json)) return;

		$this->_rawData = $json;
	}
}