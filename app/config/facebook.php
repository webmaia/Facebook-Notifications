<?php
	$config['appId']  = '514448035289505';
	$config['secret'] = '0077cc0f2364adea04a39e5d9dbd4337';
	$config['grant_type']='client_credentials';
	$facebook = new Facebook($config);
	
	function facebook()
	{
		$config['appId']  = '514448035289505';
		$config['secret'] = '0077cc0f2364adea04a39e5d9dbd4337';
		$config['grant_type']='client_credentials';
		$facebook = new Facebook($config);
		$facebook->setAccessToken($config['appId'].'|'.$config['secret']);
		return $facebook;
	}
?>