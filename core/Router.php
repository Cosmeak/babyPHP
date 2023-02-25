<?php

namespace Core;
use Core\Request;

use Core\Response;
use Exception;
use function Core\Helpers\dd;

/**
 * Route class 
 *
 * Define application routes and HTTP request
 */
class Router
{
	/**
	 * Auto save to access Application created router
	 */
	private static Router $router;

	/**
	 * Get the request from application
	 */
	private Request $request;
	
	/**
	 * 
	 */
	private Response $response;

	/**
	 * Router contructor
	 */
	public function __construct(Request $request, Response $response)
	{
		$this->request = $request;
		$this->response = $response;
		self::$router = $this;
	}

	/**
	 * Route with a get request execute a callback
	 */
	public static function get(string $path, callable $callable) : void
	{
		self::$router->resolve($path, 'Get', $callable);
	}

	/**
	 * Route with a post request execute a callback
	 */
	public static function post(string $path, callable $callable) : void
	{
		self::$router->resolve($path, 'Post', $callable);
	}

	/**
	 * Route with a put request execute a callback
	 */
	public static function put(string $path, callable $callable) : void
	{
		self::$router->resolve($path, 'Put', $callable);
	}

	/**
	 * Route with a delete request execute a callback
	 */
	public static function delete(string $path, callable $callable) : void
	{
		self::$router->resolve($path, 'Delete', $callable);
	}

	/**
	 * Callback function if no one route are matched
	 * 
	 * Need to be placed in last route position
	 */
	public static function fallback(string $path, callable $callable) : void
	{
		// TODO
	}

	/**
	 * Resolve all route path requested
	 */
	private function resolve(string $path, string $action, callable $callable) : mixed
	{
		$router = Router::$router;
		// Check if request is a DELETE / same action as requested
		$isAction = 'is' . $action;
		if (!$router->request->$isAction()) {
			return false;
		}
		
		// Check if route path have parameters contain inside brackets like "{id}"
		preg_match_all("/(?<={).+?(?=})/", $path, $matchedParams);
		if (empty($matchedParams[0])) {
			// Check if path is equal to this else stop here
			if ($router->request->getPath() !== $path) {
				return false;
			}
			// Call function now, no need to go further
			return call_user_func($callable);
		}

		// Init array to stock parameters key
		$parametersKey = []; 

		// Init empty array to add all index parameters get from the path
		$parameters = [];

		// Set parameters names
		foreach ($matchedParams[0] as $key) {
			$parametersKey[] = $key;
		}

		// Explode path to get the parameter name
		$explodePath = explode('/', $path);
		$parametersIndex = [];
		foreach ($explodePath as $index => $value) {
			// Check if segment of url contain parameter
			if(preg_match("/{.*}/", $value)){
				$parametersIndex[] = $index;
			}
		}

		// Explode requested uri
		$explodeUri = explode('/', $router->request->getPath());

		// Compare Uri with path
		foreach ($parametersIndex as $key => $index) {
			if (empty($explodeUri[$index])) {
				return false;
			} 

			// Set parameters values
			$parameters[$parametersKey[$key]] = $explodeUri[$index];

			// Replace to create a regex for comparing with route path
			$explodeUri[$index] = "{.*}";
		}

		// Convert array to string
		$implodeUri = implode('/', $explodeUri);
		// Replace all / to avoid unknown modifier error with preg_match
		$implodeUri = str_replace("/", '\\/', $implodeUri);

		// Match route with regex
		if (preg_match("/$implodeUri/", $path)) {
			return call_user_func($callable);
		}
	}
}