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
     * signUpUser() -> show sign up view for users
     */
    public function signUpUser()
    {
        $error = null;
        return Functions::callView('login/signup-user', ['error'=>$error]);
    }

    public function registerUser($requests)
    {
        //Instantiate Models and core functions
        $functions = new Functions;
        $userModel = new UserModel;

        //Define Connections,Columns and Tables
        $user_table = $userModel->table;

        $user_fname = $userModel->column('first_name');
        $user_lname = $userModel->column('last_name');
        $user_email = $userModel->column('email');
        $user_address = $userModel->column('address');
        $user_username = $userModel->column('username');
        $user_password = $userModel->column('password');

        //CSRF Security -> validate token
        $functions->validateToken();

        //Query Execution insertion of data
        $insert_user_data = $functions->dbQueryExec(
            'INSERT INTO '.$user_table.' 
            (
                '.$user_fname.', 
                '.$user_lname.', 
                '.$user_email.', 
                '.$user_address.', 
                '.$user_username.',
                '.$user_password.'
            ) VALUES (?,?,?,?,?,password(?))',
            'ssssss',
            [
                $requests['fname'],
                $requests['lname'],
                $requests['email'],
                $requests['address'],
                $requests['username'],
                $requests['password']
            ]
        );

        //Throwing status
        if($insert_user_data){
            $error ='<div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Registration completed!</strong>
                Sign in now and explore.
            </div>';
           return Functions::callView('login/login-user', ['error'=>$error]);
        }else{
            $error ='<div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Registration failed!</strong>
                There is something wrong, please try again!.
            </div>';
            return Functions::callView('login/signup-user', ['error'=>$error]);
        }
        
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
     * signUpHost() -> show sign up view for hosts
     */
    public function signUpHost()
    {
        $error = null;
        return Functions::callView('login/signup-host', ['error'=>$error]);
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

    public function test(){
        $mailto = 'jessagracecasabuena16@gmail.com';
        $mailto_name = 'Jessa Grace Casabuena';
        $subject = 'Test Email';
        $body = '<b>Yehey it is Woking!!!! <a href="https://www.facebook.com">Click Here</a></b>';
        Functions::sendEmail(
            $mailto,
            $mailto_name,
            $subject,
            $body
        );
    }
}
