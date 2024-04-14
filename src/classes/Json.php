<?php

namespace DjinnDev\RequestHandler;

use \DjinnDev\RequestHandler\Abstracts\Input;
use \DjinnDev\ToolBasics\Traits\Instance;
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
		$this->loadDataSource();
	}

	/**
	 * Public.
	 * Resets class to pull data from original source.
	 * 
	 * @return null
	 */
	public function loadDataSource(): null
	{
		$input = $this->_getPhpInputContents();
		if(empty($input)) return null;

		$json = json_decode($input, true);
		if(!is_array($json)) return null;

		$this->_rawData = $json;
	}
}