<?php

// Require the class

require_once "init.php";
// Use this namespace
use Steampixel\Route;

if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
}

Route::pathNotFound(function () {
    header('HTTP/1.0 404 Not Found');

});
require_once "routes\uzivatel_routes.php";
require_once "routes\admin_routes.php";
require_once "routes\api_routes.php";
// Run the router
Route::run('/');