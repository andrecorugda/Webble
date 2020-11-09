<?php

Route::add('/', function () {
    return callController(
        'DashboardController',
        'index'
    );
}, 'get');

Route::add('/404', function () {
    return callController(
        'AppController',
        'app_404'
    );
}, 'get');

Route::add('/405', function () {
    return callController(
        'AppController',
        'app_405'
    );
}, 'get');

Route::add('/dashboard', function () {
    return callController(
        'DashboardController',
        'index'
    );
}, 'get');

//Keep this route for testing
// Route::add('/test', function () {
//     return callController(
//         'LoginController',
//         'test'
//     );
// }, 'get');

