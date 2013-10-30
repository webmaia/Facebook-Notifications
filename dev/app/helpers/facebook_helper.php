<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('enviar_notificacion'))
{
	function enviar_notificacion($mensaje, $destino,$href='?live=yes')
	{
		$CI =& get_instance();
		//var_dump($CI->facebook);
		if (is_array($destino))
		{
	        $facebook->setAccessToken($CI->config->appId.'|'.$CI->config->secret);
	        $params = array(
	           'href' => $href,
                'template' => $mensaje,
            );
          	foreach ($destino as $value) {
          		$CI->facebook->api('/' . $value . '/notifications/', 'post', $params);
          	}
		}
	}
}
