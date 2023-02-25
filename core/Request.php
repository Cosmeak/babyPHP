<?php

namespace Core;
use function Core\Helpers\dd;

/**
 * Request class
 * 
 * Contain request information and all methods to get data from the body (http request)
 */
class Request
{
	/**
	 * Get the request Method from the server
	 */
	public function getMethod() : string
	{
		return $_SERVER['REQUEST_METHOD'];
	}

	/**
	 * Return Url path
	 */
	public function getPath() : string 
	{
		return filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
	}

	/**
	 * Get all params from url query
	 */
	public function getUrlParams() : ?array
	{
		$uri = $_SERVER['REQUEST_URI'];
		$paramsPosition = strpos($uri, '?');
		if (!$paramsPosition) {
			return NULL;
		}
		$stringParams = substr($uri, $paramsPosition + 1);
		$paramslist = explode('&', $stringParams);

		$paramsAssoc = [];
		foreach($paramslist as $param) {
			$explode = explode('=', $param);
			$paramsAssoc[$explode[0]] = $explode[1];
		}

		return $paramsAssoc;
	}

	/**
	 * 
	 */
	public function isGet() : bool
	{
		return $this->getMethod() == 'GET';
	}

	/**
	 * 
	 */
	public function isPost() : bool
	{
		return $this->getMethod() == 'POST';
	}

	/**
	 * 
	 */
	public function isPut() : bool
	{
		return $this->getMethod() == 'PUT';
	}

	/**
	 * 
	 */
	public function isPatch() : bool
	{
		return $this->getMethod() == 'PATCH';
	}

	/**
	 * 
	 */
	public function isDelete() : bool
	{
		return $this->getMethod() == 'DELETE';
	}
}
