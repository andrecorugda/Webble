<?php

require_once __DIR__.'/../src/models/PermissionRoleModel.php';
require_once __DIR__.'/../src/models/UserModel.php';
require_once __DIR__.'/functions.php';

Class Middleware {

    public function permission($slug, $callback = null){

        if(isset($_SESSION['logged_user'])){

            $permission_model = new PermissionRoleModel;
            $user_model = new UserModel;
    
            $permission_table = $permission_model->table;
            $user_table = $user_model->table;
    
            $role_id = dbQueryGetOne(
                'SELECT role_id FROM '.$user_table.' WHERE user_id = ?',
                's',
                [$_SESSION['logged_user']]
            );
    
            $count_permission = dbQueryGetOne(
                'SELECT count(*) FROM '.$permission_table.' WHERE role_id = ? AND slug = ?',
                'ss',
                [$role_id,$slug]
            );
    
            if($count_permission > 0){
                $callback();
            }
        }
        
    }

}

?>