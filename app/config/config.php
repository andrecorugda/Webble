<?php

require_once __DIR__.'/database.php';
require_once __DIR__.'/app.php';

Class Config {

    /**
     * Compiles all config files
     */
    public function __construct()
    {
        /****************************
         * Initialize Config classes
         * **************************/
        $database = new Database;
        $app = new App;

        /****************************
         * Assign All Configuration
         * **************************/
        $this->database_config = $database->getDatabaseConfig('dev');
        $this->app_config = $app->getAppConfig();
    }

}

?>