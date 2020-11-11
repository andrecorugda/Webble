<?php

Class Models {

    private $connection;
    private $host = "";
    private $db = "";
    private $user = "";
    private $pass = "";
    private $port = "";

    public function __construct()
    {
        $this->startConnection();
    }

    private function setDbConfig()
    {
        $dbConfig = transConfig('database_config');
        $this->host = $dbConfig['host'];
        $this->db = $dbConfig['db'];
        $this->user = $dbConfig['user'];
        $this->pass = $dbConfig['pass'];
        $this->port = $dbConfig['port'];
        $this->socket = $dbConfig['socket'];
    }

    private function startConnection()
    {
        $this->setDbConfig();
        $this->connection = new PDO('mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->db.'', $this->user, $this->pass);
    }

    public function queryBuilder()
    {
        $this->startConnection();
        $connection = $this->connection;
        return new \ClanCats\Hydrahon\Builder('mysql', 
            function($query, $queryString, $queryParameters) use($connection)
            {
                $statement = $connection->prepare($queryString);
                $statement->execute($queryParameters);

                if ($query instanceof \ClanCats\Hydrahon\Query\Sql\Select)
                {
                    return $statement->fetchAll(\PDO::FETCH_ASSOC);
                }
            }
        );
    }

    public function column($entity)
    {
        return $this->fillable[$entity];
    }

}

?>