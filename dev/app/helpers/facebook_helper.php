<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('enviar_notificacion'))
{
	function enviar_notificacion($mensaje, $destino,$href='?live=yes')
	{
		$CI =& get_instance();
		//var_dump($CI->facebook);
		if (is_array($destino))
		{
	        //$CI->facebook->setAccessToken('212654485574232|43f516956439f1a03fb60dddd5eb0afe');
	        $CI->token();
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
