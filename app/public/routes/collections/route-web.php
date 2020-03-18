<?php

Route::add('/', function () {
    return Functions::callController(
        'DashboardController',
        'index'
    );
}, 'get');

Route::add('/404', function () {
    return Functions::callController(
        'AppController',
        'app_404'
    );
}, 'get');

Route::add('/405', function () {
    return Functions::callController(
        'AppController',
        'app_405'
    );
}, 'get');

Route::add('/dashboard', function () {
    return Functions::callController(
        'DashboardController',
        'index'
    );
}, 'get');
