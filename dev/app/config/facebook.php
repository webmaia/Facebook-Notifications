<?php
	$config['appId']  = '212654485574232';
	$config['secret'] = '43f516956439f1a03fb60dddd5eb0afe';
	$config['grant_type']='client_credentials';
	$facebook = new Facebook($config);
	
	function facebook()
	{
		$config['appId']  = '212654485574232';
		$config['secret'] = '43f516956439f1a03fb60dddd5eb0afe';
		$config['grant_type']='client_credentials';
		$facebook = new Facebook($config);
		$facebook->setAccessToken($config['appId'].'|'.$config['secret']);
		return $facebook;
	}
?>