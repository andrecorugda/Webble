<?php

class App
{
    public function getAppConfig()
    {
        return [
            'app_root' => '/hotel',//App root defines root directory if existing,
            'app_index' => '/dashboard',//App index defines default uri directory
            'app_name' => 'Kwarto App',//App name is used to define app name
            'app_title' => 'Kwarto App | ',// App title is used to define application title on tabs
            'app_icon' => '',
            'app_login_user' => '/login/user',//App login index defines default uri login user directory
            'app_login_host' => '/login/host',//App login index defines default uri login host directory
        ];
    }
}
