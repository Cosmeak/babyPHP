<?php
use Core\Application;

/*
|--------------------------------------------------------------------------
| Autoload
|--------------------------------------------------------------------------
|
| After running "composer install", we can use the autoloader file created.
|
*/
require_once __DIR__ . '/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Application
|--------------------------------------------------------------------------
|
| Create and run Application
|
*/
$app = new Application();
$app->run();
