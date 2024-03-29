<?php

use Chungu\Core\Mantle\Router;
use Chungu\Core\Mantle\Request;

//require the main file joining all the parts of the app
require 'Core/bootstrap.php';

//Try to load the routes, direct the URI and check the request method
 try {

    Router::load('routes.php')->direct(Request::uri(), Request::method());
    
} catch (\Exception $e) {

    abort($e->getMessage(), $e->getCode());
}
