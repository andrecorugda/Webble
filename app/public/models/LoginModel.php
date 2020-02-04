<?php

Class LoginModel {

    public function __construct()
    {
        $this->table = 'fw_user';
        $this->fillable = [
            'user_id',
            'user_fname',
            'user_lname',
            'user_email',
            'user_username',
            'user_password'
        ];
    }

}

?>