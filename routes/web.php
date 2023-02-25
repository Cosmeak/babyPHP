<?php

use Core\Router;

Router::get('/', function () {
	echo 'hello world';
});

Router::get('/test', function () {
	echo '<h1>Test</h1> <br> <p>Ceci est ma page de test du router 🙂</p>';
});

Router::get('/test/{id}', function () {
	echo 'test page for params';
});
