<?php

namespace DjinnDev\RequestHandler\Abstracts;

use \DjinnDev\ToolBasics\Interfaces\Factory;

abstract class Input implements Factory
{
	/**
	 * Protected.
	 * An array of all the information sent over.
	 * Data is filled on first call of getInstance.
	 * 
	 * @var array
	 */
	protected array $_rawData = [];

	/**
	 * Private.
	 * Used for validation. Setup to use array_key_exists for speed reasons.
	 * 
	 * @var array
	 */
	private array $__validKeyTypes = ['string' => 1, 'integer' => 1];

	/**
	 * Public.
	 * Returns copy of parsed data from request.
	 * 
	 * @return array
	 */
	public function getRawDataArray(): array
	{
		return $this->_rawData;
	}

	/**
	 * Private.
	 * Returns value of specific location in request.
	 * 
	 * @param mixed $data
	 * @param string|int $index
	 * @param string|int|null ...$indexes
	 * @return mixed
	 */
	private function __getInput($data, string|int $index, string|int|null ...$indexes)
	{
		if(
			// verify data is currently an array
			!is_array($data)
			// verify index can be found
			|| !array_key_exists($index, $data)
		)
		{
			// input not found
			return null;
		}

		// Set data to be equal to next value
		$data = $data[$index];

		// check if we need to go deeper
		if(!empty($indexes))
		{
			// set index to be next item in the array
			$index = $indexes[0];
			// remove next item in array
			unset($indexes[0]);
			// reset the keys
			reset($indexes);
			// recursive call
			$data = $this->__getInput($data, $index, ...$indexes);
		}

		// data found, return it. value may be null
		return $data;
	}
    
	/**
	 * Public.
	 * Returns value of specific location in request.
	 * 
	 * @param string|int $index
	 * @param string|int|null ...$indexes
	 * @return mixed
	 */
	public function getInput(string|int $index, string|int|null ...$indexes)
	{
		return $this->__getInput($this->_rawData, $index, ...$indexes);
	}

	/**
	 * Public.
	 * Check if specific location in request has a value
	 * 
	 * @param string|int $index
	 * @param string|int|null ...$indexes
	 * @return bool
	 */
	public function hasInput(string|int $index, string|int|null ...$indexes): bool
	{
		// utilize getInput to reduce code redundancy
		return !is_null($this->getInput($index, ...$indexes));
	}

	/**
	 * Public.
	 * Get type of value for specific location in request
	 * 
	 * @param string|int $index
	 * @param string|int|null ...$indexes
	 * @return string
	 */
	public function getInputType(string|int $index, string|int|null ...$indexes): string
	{
		// utilize getInput to reduce code redundancy
		return gettype($this->getInput($index, ...$indexes));
	}
}