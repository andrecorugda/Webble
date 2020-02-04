<?php
session_start();
require_once __DIR__.'/../../core/functions.php';
require_once __DIR__.'/../../core/middleware.php';
require_once __DIR__.'/Router.php';

/**********************************/
/****** Collection of Routes ******/
/**********************************/

Route::add('/sample/index',function(){
    return Functions::callController(
        'SampleController',
        'index'
    );
},'get');

//Middleware integration
Middleware::permission('view-dashboard',function(){

    Route::add('/sample/show',function(){
        return Functions::callController(
            'SampleController',
            'show'
        );
    },'get');

    Route::add('/sample/create',function(){
        return Functions::callController(
            'SampleController',
            'create'
        );
    },'get');

});

Route::add('/sample/store',function(){
    return Functions::callController(
        'SampleController',
        'store',
        [
            'user'=>$_POST['user'],
            'status'=>$_POST['status']
        ]
    );
},'post');

Route::add('/sample/destroy/([0-9]*)/([a-z]*)',function($id,$text){
    return Functions::callController(
        'SampleController',
        'destroy',
        [
            'id'=>$id,
            'text'=>$text,
        ]
    );
},'get');


/************ Login *************/

Route::add('/login',function(){
    return Functions::callController(
        'LoginController',
        'index'
    );
},'get');

Route::add('/login',function(){
    return Functions::callController(
        'LoginController',
        'login',
        [
            'username'=>$_POST['user-input'],
            'password'=>$_POST['pass-input']
        ]
    );
},'post');

Route::add('/login/destroy',function(){
    return Functions::callController(
        'LoginController',
        'destroy'
    );
},'get');

/**********************************/
/****** Execution of Routes ******/
/**********************************/

$functions = new Functions;
$basepath = $functions->transConfig('app_config','app_root');
Route::run($basepath);