<?php

class TestModel extends Models
{
    public function __construct()
    {
        $this->table = 'test_table';
        $this->guarded = [
            'id' => 'id',
        ];
        $this->fillable = [
            'name' => 'name',
            'age' => 'age'
        ];
    }
}
