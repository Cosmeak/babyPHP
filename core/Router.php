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
		$router = Router::$router;

		// Check if request is a GET / same action as requested
		if (!$router->request->isGet()) {
			return;
		}
		
		// Check if path is equal to this else stop here
		if ($router->request->getPath() !== $path) {
			return;
		}

		$router->resolve($callable);
	}

	/**
	 * 
	 */
	public static function post(string $path, callable $callable)
	{
		$router = Router::$router;

		// Check if request is a POST / same action as requested
		if (!$router->request->isPost()) {
			return;
		}
		
		// Check if path is equal to this else stop here
		if ($router->request->getPath() !== $path) {
			return;
		}

		$router->resolve($callable);
	}

	/**
	 * 
	 */
	public static function put(string $path, callable $callable)
	{
		$router = Router::$router;

		// Check if request is a PUT / same action as requested
		if (!$router->request->isPut()) {
			return;
		}
		
		// Check if path is equal to this else stop here
		if ($router->request->getPath() !== $path) {
			return;
		}

		$router->resolve($callable);
	}

	/**
	 * 
	 */
	public static function delete(string $path, callable $callable)
	{
		$router = Router::$router;

		// Check if request is a DELETE / same action as requested
		if (!$router->request->isDelete()) {
			return;
		}
		
		// Check if path is equal to this else stop here
		if ($router->request->getPath() !== $path) {
			return;
		}

		return $router->resolve($callable);
	}

	/**
	 * 
	 */
	private function resolve(callable $callable)
	{
		// TODO: make all check and launch a function from a controller
		return call_user_func($callable);
	}
}