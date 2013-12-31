<?php 

class EmailConfig {

    public $default;
    public $smtp;

      function __construct() {
            $this->default = array(
            'transport' => 'Smtp',    
            'from' => array(str_replace("'", '', getenv('SENDGRID_USERNAME')) => 'Albania Accel'),    
            'host' => 'smtp.sendgrid.net',    
            'port' => 587,    
            'username' => str_replace("'", '', getenv('SENDGRID_USERNAME')),    
            'password' => str_replace("'", '', getenv('SENDGRID_PASSWORD')),
            'log' => true
        );

            $this->smtp = array(
            'transport' => 'Smtp',    
            'from' => array(str_replace("'", '', getenv('SENDGRID_USERNAME')) => 'Albania Accel'),    
            'host' => 'smtp.sendgrid.net',    
            'port' => 587,    
            'username' => str_replace("'", '', getenv('SENDGRID_USERNAME')),    
            'password' => str_replace("'", '', getenv('SENDGRID_PASSWORD')),
            'log' => true
        );
    }
}