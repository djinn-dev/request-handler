<?php

namespace DjinnDev\RequestHandler;

abstract class Base implements Factory
{
	/**
	 * Protected.
	 * Used for saving static instace of class
	 * 
	 * @var object|null
	 */
	protected static ?object $_instance = null;
}