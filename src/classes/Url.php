<?php

namespace DjinnDev\RequestHandler;

use \DjinnDev\RequestHandler\Interfaces\Factory;
use \DjinnDev\RequestHandler\Traits\Instance;

class Url implements Factory
{
    use Instance;

	protected string $_schema;
	protected string $_host;
	protected int $_port;
	protected string $_uri;

    /**
	 * Private.
	 * Run init parts for loading class.
	 */
	private function __construct()
	{
		$this->_schema = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';

		$this->_port = (int) $_SERVER['SERVER_PORT'] ?? 80;

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
	 * @return int
	 */
	public function getPort(): int
	{
		return $this->_port;
	}

	/**
	 * @return string
	 */
	public function getUri(): string
	{
		return $this->_uri;
	}

	/**
	 * @return string
	 */
	public function getFullUrl(): string
	{
		return $this->_schema . '://' . $this->_host . $this->_uri;
	}
}