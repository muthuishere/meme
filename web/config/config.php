<?php

define( 'DS', DIRECTORY_SEPARATOR );
define( 'ROOT', dirname(dirname(__FILE__)) );

/*
===============================================================================
  Autoload classes
===============================================================================
*/

spl_autoload_register("__autoload");
function __autoload($class_name)
{
	$class_name = strtolower($class_name);
	
	if (file_exists( ROOT . DS . 'library' . DS . 'model' . DS . $class_name . '.php')) {
		require_once ROOT . DS . 'library' . DS . 'model' . DS . $class_name . '.php';
	}

	else if (file_exists(ROOT . DS . 'library' . DS . 'vendor' . DS . $class_name . '.php' )) {
		require_once ROOT . DS . 'library' . DS . 'vendor' . DS . $class_name . '.php';
	}
}


/*
===============================================================================
  Database
===============================================================================
*/

$url=parse_url(getenv("CLEARDB_DATABASE_URL"));
if( count($url) > 1 ) {
	define('HOST', 		$url["host"]);
	define('USER', 		$url["user"]);
	define('PASSWORD', 	$url["pass"]);
	define('DB', 		substr($url["path"],1));
} else {
	define('HOST', 		'localhost');
	define('USER', 		'root');
	define('PASSWORD', 	'root');
	define('DB', 		'database');
}


/*
===============================================================================
  Load manually
===============================================================================
*/

require ROOT . DS . 'library' . DS . 'vendor' . DS . 'rb.php';

/*
===============================================================================
  Initiate models
===============================================================================
*/

// Initiate models
$models = new stdClass();