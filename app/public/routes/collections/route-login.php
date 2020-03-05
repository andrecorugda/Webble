<?php

Route::add('/login', function () {
    return Functions::callController(
        'LoginController',
        'index'
    );
}, 'get');

Route::add('/login', function () {
    return Functions::callController(
        'LoginController',
        'login',
        [
            'username'=>$_POST['user-input'],
            'password'=>$_POST['pass-input']
        ]
    );
}, 'post');

Route::add('/logout', function () {
    return Functions::callController(
        'LoginController',
        'logout'
    );
}, 'get');
