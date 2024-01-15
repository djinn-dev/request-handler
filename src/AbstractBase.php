<?php

namespace DjinnDev\RequestHandler;

abstract class AbstractBase implements FactoryInterface
{
	/**
	 * Protected.
	 * Used for saving static instace of class
	 * 
	 * @var object|null
	 */
	protected static ?object $_instance = null;
}