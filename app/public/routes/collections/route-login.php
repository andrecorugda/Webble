<?php

//Login user get
Route::add('/login/user', function () {
    return Functions::callController(
        'LoginController',
        'indexUser'
    );
}, 'get');

//Login user post
Route::add('/login/user', function () {
    return Functions::callController(
        'LoginController',
        'loginUser',
        [
            'username'=>$_POST['user-input'],
            'password'=>$_POST['pass-input']
        ]
    );
}, 'post');

//Login host get
Route::add('/login/host', function () {
    return Functions::callController(
        'LoginController',
        'indexHost'
    );
}, 'get');

//Login host post
Route::add('/login/host', function () {
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
