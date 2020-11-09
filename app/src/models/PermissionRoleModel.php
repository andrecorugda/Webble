<?php

Class PermissionRoleModel extends Models {

    public function __construct()
    {
        $this->table = 'fw_permission_role';
        $this->fillable = [
            'id',
            'name',
            'slug',
            'role_id',
            'date_at'
        ];
    }

}

?>