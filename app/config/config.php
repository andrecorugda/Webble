<?php

require_once __DIR__.'/database.php';
require_once __DIR__.'/app.php';
require_once __DIR__.'/mail.php';

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
        $mail = new Mail;

        /****************************
         * Assign All Configuration
         * **************************/
        $this->database_config = $database->getDatabaseConfig('dev');
        $this->app_config = $app->getAppConfig();
        $this->mail_config = $mail->getMailConfig();
    }

}

?>