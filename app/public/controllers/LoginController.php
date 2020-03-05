<?php

require_once __DIR__.'/../../core/functions.php';
require_once __DIR__.'/../models/LoginModel.php';

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
     * index() -> show login view
     */
    public function index()
    {
        $error = null;
        return Functions::callView('login/login-layout', ['error'=>$error]);
    }

    /**
     * login() -> execute login sequence
     */
    public function login($requests)
    {
        //Instantiate Models and core functions
        $functions = new Functions;
        $loginModel = new LoginModel;

        //Define Connections,Columns and Tables
        $user_table = $loginModel->table;
        $user_username = $loginModel->column('username');
        $user_password = $loginModel->column('password');

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
            return Functions::callView('login/login-layout', ['error'=>$error]);
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
