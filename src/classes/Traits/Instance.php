<?php

namespace DjinnDev\RequestHandler\Traits;

trait Instance
{
	/**
	 * Protected.
	 * Used for saving static instace of class
	 * 
	 * @var object|null
	 */
	protected static ?object $_instance = null;
	
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