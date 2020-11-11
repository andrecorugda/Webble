<?php

Class Models {

    private $connection = "";
    private $host = "";
    private $db = "";
    private $user = "";
    private $pass = "";

    public function __construct()
    {
        $this->startConnection();
    }

    private function setDbConfig()
    {
        $dbConfig = transConfig('database_config');
        $this->$host = $dbConfig['host'];
        $this->$db = $dbConfig['db'];
        $this->$user = $dbConfig['user'];
        $this->$pass = $dbConfig['pass'];
    }

    private function startConnection()
    {
        $this->setDbConfig();
        $this->$connection = new PDO('mysql:host=localhost;dbname=my_database', 'username', 'password');
    }

    public function connectionStatus()
    {
        return $this->$connection;
    }

    public function column($entity)
    {
        return $this->fillable[$entity];
    }

}

?>