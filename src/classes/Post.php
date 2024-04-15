<?php

namespace DjinnDev\RequestHandler;

use \DjinnDev\RequestHandler\Abstracts\Input;
use \DjinnDev\ToolBasics\Traits\Instance;

class Post extends Input
{
    use Instance;

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
		$this->_rawData = $_POST;
	}
}