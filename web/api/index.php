<?php

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

// Database connection

try {
    R::setup('mysql:host=' . HOST . ';dbname=' . DB,  USER, PASSWORD);
    R::debug( TRUE );
} catch (PDOException $e) {
    error_log($e->getMessage());
}

// Initiate the api
$app = new \Slim\Slim(array(
	'debug' => TRUE,
));


/*
===============================================================================
  API v1
===============================================================================
*/

$app->group('/v1', function() use ($app) {

    /*
    ===============================================================================
      GET
    ===============================================================================
    */

    $app->get('/welcome', function() use ($app) {

        $response = array();
        $response['error'] = false;
        $response['message'] = 'Welcome to Slim Framework Restful API';
        echo_response(200, $response);

    });

});

$app->run();

/*
===============================================================================
  Helpers
===============================================================================
*/

/**
 * Verify request parameters
 *
 * @param array $required_fields
 * @access public 
 **/
function verify_required_params($required_fields) {
    
    $error = false;
    $error_fields = "";
    $request_params = array();
    $request_params = $_REQUEST;
    
    // Handling PUT request params
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $app = \Slim\Slim::getInstance();
        parse_str($app->request()->getBody(), $request_params);
    }
    foreach ($required_fields as $field) {
        if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
            $error = true;
            $error_fields .= $field . ', ';
        }
    }
 
    if ($error) {
        // Required field(s) are missing or empty
        // echo error json and stop the app
        $response = array();
        $app = \Slim\Slim::getInstance();
        $response["error"] = true;
        $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
        error_log($response['message']);
        echo_response(400, $response);
        $app->stop();
    }
    
}


/**
 * Echo response as JSON
 *
 * @param integer $status_code
 * @param array $response
 * @access public 
 **/
function echo_response($status_code, $response) {
    
    $app = \Slim\Slim::getInstance();
    // Http response code
    $app->status($status_code);
 
    // setting response content type to json
    $app->contentType('application/json');
    
    echo json_encode($response);

}

/**
 * Authenticate using APIKey
 *
 * @access public 
 **/

function authenticate(\Slim\Route $route) {
    
    // Getting request headers
    $headers = apache_request_headers();
    $response = array();
    $app = \Slim\Slim::getInstance();

    // Verifying Authorization Header
    if (isset($headers['Authorization'])) { 
        
        $apikey = $headers['Authorization'];
        
        // Validate API key here
 
        // If not valid, uncomment the following lines
        //
        //$response["error"] = true;
        //$response["message"] = "Access Denied. Invalid Api key";
        //echo_response(401, $response);
        //$app->stop();
        

    } else {
        // api key is missing in header
        $response["error"] = true;
        $response["message"] = "Api key is misssing";
        echo_response(400, $response);
        $app->stop();
    }

}