<?php

require_once __DIR__.'/../../core/functions.php';
require_once __DIR__.'/../models/LoginModel.php';

Class LoginController {
    
    public function __construct()
    {
        $functions = new Functions;
        $functions->loginSecurity();
    }

    public function index()
    {
        $error = null;
        return Functions::callView(
            'login/login-layout',
            [
                'error'=>$error
            ]
        );
    }

    public function login($requests)
    {

        $functions = new Functions;
        $loginModel = new LoginModel;

        $count = $functions->dbQueryGet(
            'SELECT count(*) FROM '.$loginModel->table.' WHERE user_username = ? AND user_password = ?',
            'ss',
            [$requests['username'],$requests['password']]
        );

        foreach($count as  $count){
            $user_count =  $count['count(*)'];
        }
        
        if($user_count > 0){
            $_SESSION['logged_user'] = 1;
            Functions::directTo(Functions::transRootConfig('app_config','app_index'));
        }else{
            $error ='<div class="alert alert-danger" role="alert">
                        Username or password is in correct!
                     </div>';
            return Functions::callView('login/login-layout',['error'=>$error]);
        }
    }

    public function destroy()
    {
        unset($_SESSION['logged_user']);
        session_destroy();
        Functions::directTo(Functions::transRootConfig('app_config','app_login_index'));
    }

}

?>