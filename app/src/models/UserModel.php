<?php

class UserModel extends Models
{
    public function __construct()
    {
        $this->table = 'users';
        $this->guarded = [
            'id' => 'id',
        ];
        $this->fillable = [
            'username' => 'username',
            'password' => 'password',
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'email' => 'email',
            'avatar' => 'avatar',
            'address' => 'address',
            'created_at' => 'created_at'
        ];
    }
}
