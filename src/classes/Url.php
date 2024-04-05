<?php

namespace DjinnDev\RequestHandler;

use \DjinnDev\RequestHandler\Interfaces\Factory;
use \DjinnDev\ToolBasics\Traits\Instance;

class Url implements Factory
{
    use Instance;

	protected string $_schema;
	protected string $_host;
	protected int $_port;
	protected string $_path;

    /**
	 * Private.
	 * Run init parts for loading class.
	 */
	private function __construct()
	{
		$this->_schema = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';

		$this->_port = (int) ($_SERVER['SERVER_PORT'] ?? 80);

		$this->_host = $_SERVER['HTTP_HOST'] ?? 'localhost';

		$uri = $_SERVER['REQUEST_URI'] ?? '';
		$querySplit = explode('?', $uri);
		$this->_path = '/' . trim($querySplit[0], '/');
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
	public function getPath(): string
	{
		return $this->_path;
	}

	/**
	 * @return string
	 */
	public function getFullUrl(): string
	{
		$url = $this->_schema . '://';
		$url .= $this->_host;
		if(
			!in_array($this->_port, [80, 443])
			|| ($this->_port === 80 && $this->_schema !== 'http')
			|| ($this->_port === 443 && $this->_schema !== 'https')
		)
		{
			$url .= ':' . $this->_port;
		}
		$url .= $this->_path;
		return $url;
	}
}