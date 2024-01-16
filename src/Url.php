<?php

namespace DjinnDev\RequestHandler;

class Url extends AbstractBase
{
	protected string $_schema;
	protected string $_host;
	protected string $_port;
	protected string $_uri;

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
		$this->_schema = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';

		$this->_port = $_SERVER['SERVER_PORT'] ?? '80';

		$this->_host = $_SERVER['HTTP_HOST'] ?? 'localhost';

		$uri = $_SERVER['REQUEST_URI'] ?? '';
		$querySplit = explode('?', $uri);
		$this->_uri = '/' . trim($querySplit[0], '/');
	}

	/**
	 * @return string
	 */
	public function getSchema(): string
	{
		return $this->_schema;
	}

	/**
	 * @return string
	 */
	public function getHost(): string
	{
		return $this->_host;
	}

	/**
	 * @return string
	 */
	public function getUri(): string
	{
		return $this->_uri;
	}

	public function getFullUrl(): string
	{
		return $this->_schema . '://' . $this->_host . $this->_uri;
	}
}