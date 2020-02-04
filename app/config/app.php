<?php

Class App {

    public function getAppConfig()
    {
        return [
            'app_root' => '/practice/webble',//App root defines root directory if existing,
            'app_index' => '/sample/show',//App index defines default uri directory
            'app_login_index' => '/login',//App login index defines default uri login directory
            'app_name' => 'Webble',//App name is used to define app name
            'app_title' => 'Webble | ',// App title is used to define application title on tabs
            'app_icon' => '',
        ];
    }
}

?>