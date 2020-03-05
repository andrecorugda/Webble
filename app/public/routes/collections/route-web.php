<?php

Route::add('/', function () {
    return Functions::callController(
        'DashboardController',
        'index'
    );
}, 'get');

Route::add('/dashboard', function () {
    return Functions::callController(
        'DashboardController',
        'index'
    );
}, 'get');
