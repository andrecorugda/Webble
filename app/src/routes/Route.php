<?php
session_start();
require_once __DIR__.'/../../core/Router.php';

/**********************************************/
/*** Require everytime you add a route file ***/
/**********************************************/

/**
 * Login Routes
 */
require 'collections/route-login.php';

/**
 * Web Routes
 */
require 'collections/route-web.php';

/**
 * Middleware Permissions Routes
 */
require 'collections/route-middleware-permission.php';

/**
 * Execution of routes
 */
$basepath = transConfig('app_config', 'app_root');
Route::run($basepath);
