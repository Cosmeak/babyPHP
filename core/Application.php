<?php

namespace Core;

use Core\Request;
use Core\Response;
use Core\Router;

/**
 * Application class
 * 
 * Handle request and response for all queries to the app
 */
class Application
{	
	private Router $router;

	private Request $request;

	private Response $response;
	
	public function __construct()
	{
		$this->request = new Request();
		$this->response = new Response();
		$this->router = new Router($this->request, $this->response);
	}

	/**
	 * Run application
	 */
	public function run() : void
	{	
		// Launch all routes created
		require __DIR__ . '/../routes/web.php';
	}
}