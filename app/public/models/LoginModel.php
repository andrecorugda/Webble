<?php

require_once __DIR__.'/../../core/models.php';

Class LoginModel extends Models{

    public function __construct()
    {
        $this->table = 'fw_user';
        $this->fillable = [
            'id'        => 'user_id',
            'firstname' => 'user_fname',
            'lastname'  => 'user_lname',
            'email'     => 'user_email',
            'username'  => 'user_username',
            'password'  => 'user_password'
        ];
    }

}

?>