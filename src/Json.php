<?php

namespace DjinnDev\RequestHandler;

class Json extends AbstractInput
{
	/**
	 * Public.
	 * Get pointer to existing instance of class or generate a new instance.
	 * 
	 * @return self
	 */
	public static function getInstance(): self
	{
		// Check if instance exists
		if(self::$_instance === null)
		{
			// Instance not found, make a new one
			self::$_instance = new self();
		}

		return self::$_instance;
	}

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