<?php

//view-dashboard
Middleware::permission('view-dashboard', function () {
    Route::add('/sample/show', function () {
        return callController(
            'SampleController',
            'show'
        );
    }, 'get');

    Route::add('/sample/create', function () {
        return callController(
            'SampleController',
            'create'
        );
    }, 'get');
});

//view-sample
Middleware::permission('view-sample', function () {
    Route::add('/sample/show', function () {
        return callController(
            'SampleController',
            'show'
        );
    }, 'get');

    Route::add('/sample/create', function () {
        return callController(
            'SampleController',
            'create'
        );
    }, 'get');
});
