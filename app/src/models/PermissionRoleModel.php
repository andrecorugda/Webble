<?php

Class PermissionRoleModel {

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