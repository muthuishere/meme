<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

$url = '';

if( isset( $_GET['url'] ) ) {
	$url = $_GET['url']; 
}

$urlArray = array();
$urlArray = explode("/",$url);

$page = $urlArray[0];

// Include the header
include( ROOT . DS . 'views' . DS . 'header.php' );

// Include the page content
if( file_exists( ROOT . DS . 'views' . DS . $page . '.php') ) {

	include( ROOT . DS . 'views' . DS . $page . '.php' );

} else {

	include( ROOT . DS . 'views' . DS . 'home.php' );

}

// Include the footer
include( ROOT . DS . 'views' . DS . 'footer.php' );
