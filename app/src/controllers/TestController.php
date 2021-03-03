<?php

class TestController {

    public function __construct()
    {
        $this->testConnection();
    }

    public function testConnection()
    {
        $testModel = new TestModel;
        $DB = $testModel->queryBuilder();
        $insert = $DB->table($testModel->table)->insert(
            [
                ['name' => 'Ray', 'age' => 25],
                ['name' => 'John',  'age' => 30],
                ['name' => 'Ali', 'age' => 22],
            ])->execute();
        return $insert;
    }

}

?>