<?php

class App
{
    public function getAppConfig()
    {
        return [
            'app_root' => '/hotel',//App root defines root directory if existing,
            'app_name' => 'Kwarto App',//App name is used to define app name
            'app_title' => 'Kwarto App | ',// App title is used to define application title on tabs
            'app_icon' => '',
            'app_404' => '/404',
            'app_405' => '/405',
            'app_index' => '/dashboard',//App index defines default uri directory
            'app_login_index' => '/login/user',//App login index defines default page
            'app_login_user' => '/login/user',//App login index defines default uri login user directory
            'app_login_host' => '/login/host',//App login index defines default uri login host directory
            'app_signup_user' => '/sign-up/user',//App sign up index defines default uri login user directory
            'app_signup_host' => '/sign-up/host',//App sign up index defines default uri login host directory
        ];
    }
}
