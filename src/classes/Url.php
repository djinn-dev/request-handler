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
	 * Public.
	 * Get request schema
	 * 
	 * @return string
	 */
	public function getSchema(): string
	{
		return $this->_schema;
	}

	/**
	 * Public.
	 * Get request host/domain
	 * 
	 * @return string
	 */
	public function getHost(): string
	{
		return $this->_host;
	}

	/**
	 * Public.
	 * Get request port
	 * 
	 * @return int
	 */
	public function getPort(): int
	{
		return $this->_port;
	}

	/**
	 * Public.
	 * Get request path/uri
	 * 
	 * @return string
	 */
	public function getPath(): string
	{
		return $this->_path;
	}

	/**
	 * Public.
	 * Get full request url
	 * 
	 * @param bool $withQueryString
	 * @param bool $includeImpliedPorts
	 * @return string
	 */
	public function getFullUrl(bool $withQueryString = true, bool $includeImpliedPorts = false): string
	{
		$url = $this->_schema . '://' . $this->_host;
		
		if(
			$includeImpliedPorts
			|| !in_array($this->_port, [80, 443])
			|| ($this->_port === 80 && $this->_schema !== 'http')
			|| ($this->_port === 443 && $this->_schema !== 'https')
		)
		{
			$url .= ':' . $this->_port;
		}
		
		$url .= $this->_path;
		
		if($withQueryString)
		{
			$url .= '?' . Get::getInstance()->getRawDataString();
		}

		return $url;
	}
}