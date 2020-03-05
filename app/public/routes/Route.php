<?php
session_start();
require_once __DIR__.'/../../core/functions.php';
require_once __DIR__.'/../../core/middleware.php';
require_once __DIR__.'/Router.php';

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
$functions = new Functions;
$basepath = $functions->transConfig('app_config', 'app_root');
Route::run($basepath);
