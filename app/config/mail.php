<?php

class Mail
{
    public function getMailConfig()
    {
        return [
            //Server settings
            'mail_host' => 'smtp.gmail.com', // sets GMAIL as the SMTP server
            'mail_port' => 587, // set the SMTP port for the GMAIL server
            'mail_smtp_auth' => true, // enable SMTP authentication
            'mail_smtp_secure' => 'TLS',// sets the prefix to the servier
            'mail_smtp_debug' => 2,// Enable verbose debug output
            'mail_username' => 'webble.app@gmail.com',// GMAIL username
            'mail_password' => 'ilovejessa0716',// GMAIL password
            'mail_from' => 'Kwarto App Support', 
            'mail_name_from' => 'support@kwartoapp.com',
        ];
    }
}
