<?php //app/Config/facebook.php
	$config = array(
		'Facebook' => array(
			'appId'  => str_replace("'", '', getenv('FB_APPID')),
			'apiKey' => str_replace("'", '', getenv('FB_APPKEY')),
			'secret' => str_replace("'", '', getenv('FB_SECRET')),
			'cookie' => true,
			'locale' => 'en_US',
		)
	);
?>