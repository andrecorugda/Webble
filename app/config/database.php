<?php

class Database
{
    
    /**
     * @param $stage
     * Return initiated connection
     */
    public function getDatabaseConfig($stage)
    {
        return $this->$stage();
    }

    /**
     * Development Stage
     * Return database config array
     */
    public function dev()
    {
        return [
            'host' => '127.0.0.1',
            'user' => 'root',
            'pass' => '',
            'db' => 'webble',
            'port' => '3306',
            'socket' => ''
        ];
    }
    
    /**
     * Production Stage
     * Return database config array
     */
    public function prod()
    {
        return [
            'host' => '',
            'user' => '',
            'pass' => '',
            'db' => '',
            'port' => '',
            'socket' => ''
        ];
    }

    /**
     * Local Stage
     * Return database config array
     */
    public function local()
    {
        return [
            'host' => '',
            'user' => '',
            'pass' => '',
            'db' => '',
            'port' => '',
            'socket' => ''
        ];
    }
}
