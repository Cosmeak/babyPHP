<?php

namespace Core\Helpers;

/**
 * Dump and Die function
 */
function dd(mixed $value = null) : void
{
	echo "<pre>";
	var_dump($value);
	echo "</pre>";
	die();
}