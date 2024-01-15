<?php

namespace DjinnDev\RequestHandler;

abstract class Input extends Base
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
	 * Public.
	 * Returns value of specific location in request.
	 * 
	 * @param string|int ...$inputName
	 * @return mixed
	 */
	public function getInput(string|int ...$inputName)
	{
		// save data to local for nesting checks below
		$data = $this->_rawData;

		// loop over indexes being looked for
		foreach($inputName as $key)
		{
			if(
				// verify if key is a valid index type
				!array_key_exists(gettype($key), $this->__validKeyTypes)
				// verify data is currently an array
				|| !is_array($data)
				// verify index can be found
				|| !array_key_exists($key, $data)
			)
			{
				// input not found
				return null;
			}

			// overwrite data with next valid input level
			$data = $data[$key];
		}

		// data was found, return it
		return $data;
	}

	/**
	 * Public.
	 * Check if specific location in request has a value
	 * 
	 * @param string|int ...$inputName
	 * @return bool
	 */
	public function hasInput(string|int ...$inputName): bool
	{
		// utilize getInput to reduce code redundancy
		return !is_null($this->getInput(...$inputName));
	}

	/**
	 * Public.
	 * Get type of value for specific location in request
	 * 
	 * @param string|int ...$inputName
	 * @return string
	 */
	public function getInputType(string|int ...$inputName): string
	{
		// utilize getInput to reduce code redundancy
		return gettype($this->getInput(...$inputName));
	}
}