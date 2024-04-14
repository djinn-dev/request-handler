<?php

namespace DjinnDev\RequestHandler;

use \DjinnDev\RequestHandler\Abstracts\Input;
use \DjinnDev\ToolBasics\Traits\Instance;

class Cli extends Input
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
		$argv = $_SERVER['argv'] ?? [];
		foreach($argv as $value)
		{
			if(substr($value, 0, 1) === '-' && strpos($value, '=') !== false)
			{
				$split = explode('=', $value, 2);
				$key = ltrim($split[0], '-');
				$argv[$key] = $split[1];
			}
		}
		$this->_rawData = $argv;
	}
}