<?php

Class Database {
    
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
            'host' => 'PPD-Medimix-AWS-Dev-NLB-AURORA-ec244bd0dbfbde7d.elb.us-east-1.amazonaws.com',
            'user' => 'acorugda',
            'pass' => '76m_2zT45Aur~ny',
            'db' => 'dev_fieldwork',
            'port' => '3306'
        ];
    }
    
    /**
     * Production Stage
     * Return database config array
     */
    public function prod()
    {
        return [
            'host' => 'PPD-Medimix-Prod-NLB-AURORA-W-a52308dad9c28179.elb.us-east-1.amazonaws.com',
            'user' => 'acorugda',
            'pass' => 'TMiT76:t~oi!PIj',
            'db' => 'dev_fieldwork',
            'port' => '3306'
        ];
    }

    /**
     * Local Stage
     * Return database config array
     */
    public function local()
    {
        return [
            'host' => 'PPD-Medimix-AWS-Dev-NLB-AURORA-ec244bd0dbfbde7d.elb.us-east-1.amazonaws.com',
            'user' => 'acorugda',
            'pass' => '76m_2zT45Aur~ny',
            'db' => 'dev_fieldwork',
            'port' => '3306'
        ];
    }

}

?>