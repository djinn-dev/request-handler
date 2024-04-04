<?php

namespace DjinnDev\RequestHandler\Traits;

trait Instance
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
}