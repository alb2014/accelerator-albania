<?php 
class EmailConfig {    
    public $default = array(    
        'transport' => 'Smtp',    
        'from' => array('app19805266@heroku.com' => 'Albania Accel'),    
        'host' => 'smtp.sendgrid.net',    
        'port' => 587,    
        'username' => 'app19805266@heroku.com',    
        'password' => 'w8or1w97',
        'log' => true);

        public $smtp = array(
		'transport' => 'Smtp',
		'from' => array('app19805266@heroku.com' => 'Albania Accel'),    
        'host' => 'smtp.sendgrid.net',    
        'port' => 587,    
        'username' => 'app19805266@heroku.com',    
        'password' => 'w8or1w97',
		'timeout' => 30,
		'client' => null,
		'log' => true
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);    
}