<?php

namespace DjinnDev\RequestHandler;

class Xml extends Base
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

		$xml = $this->__parseXmlStringToArray($input);
		if(!is_array($xml)) return;

		$this->_rawData = $xml;
	}

	/**
	 * Private.
	 * Takes xml string and breaks it into an associative array.
	 * 
	 * @param string $xml
	 * @return array|null
	 */
	private function __parseXmlStringToArray(string $xml): ?array
	{
		// verify valid xml string
		if(empty($xml) || substr($xml, 0, 1) != '<' || substr($xml, -1) != '>') return null;

		// parse xml
		$object = simplexml_load_string($xml);
		if(!is_object($object)) return null;

		// Convert xml to json to array
		$root = $object->getName();
		$array = json_decode(json_encode($object), true);

		// Make root for true pathing
		if(!array_key_exists($root, $array))
		{
			$array = [$root => $array];
		}

		return $array;
	}
}