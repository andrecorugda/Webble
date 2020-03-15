<?php

require_once __DIR__.'/../../core/functions.php';
require_once __DIR__.'/../models/UserModel.php';

class LoginController
{
    /**
     * Start with Authentication security
     */
    public function __construct()
    {
        //Auth Security
        $functions = new Functions;
        $functions->loginSecurity();
    }

    /**
     * indexUser() -> show login view for users
     */
    public function indexUser()
    {
        $error = null;
        return Functions::callView('login/login-user', ['error'=>$error]);
    }

    /**
     * indexHost() -> show login view for hosts
     */
    public function indexHost()
    {
        $error = null;
        return Functions::callView('login/login-host', ['error'=>$error]);
    }

    /**
     * loginUser() -> execute login sequence
     */
    public function loginUser($requests)
    {
        //Instantiate Models and core functions
        $functions = new Functions;
        $userModel = new UserModel;

        //Define Connections,Columns and Tables
        $user_table = $userModel->table;
        $user_username = $userModel->column('username');
        $user_password = $userModel->column('password');

        //CSRF Security -> validate token
        $functions->validateToken();

        //Query Execution and Retrieval of data
        $user_data = $functions->dbQueryGet(
            'SELECT * FROM '.$user_table.' WHERE '.$user_username.' = ? AND '.$user_password.' = ?',
            'ss',
            [$requests['username'],$requests['password']]
        );

        //Count data retrieved
        $user_count = count($user_data);

        //Iteration of data and re-assignment
        foreach ($user_data as  $user_data) {
            $user_id =  $user_data['user_id'];
        }
        
        //Execute validation of data
        if ($user_count > 0) {
            $_SESSION['logged_user'] = $user_id;
            Functions::directTo(
                Functions::transRootConfig('app_config', 'app_index')
            );
        } else {
            $error ='<div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Sign In Failed!</strong>
                        username or password is incorrect.
                    </div>';
            return Functions::callView('login/login-user', ['error'=>$error]);
        }
    }

    /**
     * logout() -> execute logout sequence
     */
    public function logout()
    {
        unset($_SESSION['logged_user']);
        session_destroy();
        Functions::directTo(Functions::transRootConfig('app_config', 'app_login_index'));
    }
}
