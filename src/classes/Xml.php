<?php

namespace DjinnDev\RequestHandler;

use \DjinnDev\RequestHandler\Abstracts\Input;
use \DjinnDev\ToolBasics\Traits\Instance;
use \DjinnDev\RequestHandler\Traits\PhpInput;

class Xml extends Input
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

		$xml = $this->__parseXmlStringToArray($input);
		if(!is_array($xml)) return null;

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

	/**
	 * Public.
	 * Return copy of parsed data from request.
	 * 
	 * @return string
	 */
	public function getRawDataString(): string
	{
		return $this->__buildXmlObject($this->_rawData)->asXML();
	}

	/**
	 * Private.
	 * Converts an array to a SimpleXMLElement obj
	 * 
	 * @param array $array
	 * @param SimpleXMLElement|null $xml
	 * @return SimpleXMLElement
	 */
	private function __buildXmlObject(array $array, ?SimpleXMLElement $xml = null): SimpleXMLElement
	{
		// If xml object not created
		if($xml === null)
		{
			// If only one element at base, use as root element
			$rootElement = (count($array) === 1) ? ('<' . array_key_first($array) . '/>') : '<root/>';
			$xml = new SimpleXMLElement($rootElement);
		}
		 
		// Visit all key value pair
		foreach($array as $element => $content)
		{
			// solve how to handle element
			if($element === '@attributes')
			{
				// loop array to add attributes
				foreach($content as $attribute => $value)
				{
					$xml->addAttribute($attribute, $value);
				}
			}
			elseif(is_array($content))
			{
				// use recursion to add next level
				$xml = $this-__buildXmlObject($content, $xml);
			}
			else 
			{
				// Simply add child element. 
				$xml->addChild($element, $content);
			}
		}
		 
		return $xml;
	}
}