<?php

//Login user get
Route::add('/login/user', function () {
    return Functions::callController(
        'LoginController',
        'indexUser'
    );
}, 'get');

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

//login host
Route::add('/login/host', function () {
    return Functions::callController(
        'LoginController',
        'indexHost'
    );
}, 'get');

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

//sign up user
Route::add('/sign-up/user', function () {
    return Functions::callController(
        'LoginController',
        'signUpUser'
    );
}, 'get');

Route::add('/sign-up/user', function () {
    return Functions::callController(
        'LoginController',
        'registerUser',
        [
            'fname'=>$_POST['fname-input'],
            'lname'=>$_POST['lname-input'],
            'email'=>$_POST['email-input'],
            'address'=>$_POST['address-input'],
            'username'=>$_POST['username-input'],
            'password'=>$_POST['password-input'],
        ]
    );
}, 'post');

//sign up host
Route::add('/sign-up/host', function () {
    return Functions::callController(
        'LoginController',
        'signUpHost'
    );
}, 'get');

Route::add('/sign-up/host', function () {
    return Functions::callController(
        'LoginController',
        'registerHost'
    );
}, 'post');


//logout
Route::add('/logout', function () {
    return Functions::callController(
        'LoginController',
        'logout'
    );
}, 'get');


