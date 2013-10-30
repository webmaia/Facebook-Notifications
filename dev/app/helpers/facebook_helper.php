<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('enviar_notificacion'))
{
	function enviar_notificacion($mensaje, $destino,$href='?live=yes')
	{
		$CI =& get_instance();
		//var_dump($CI->facebook);
		if (is_array($destino))
		{
	        $params = array(
	           'href' => $href,
                'template' => $mensaje,
            );
			
          	foreach ($destino as $value) {
          		echo '/' . $value . '/notifications/';
          		//$CI->facebook->api('/' . $value . '/notifications/', 'post', $params);
          	}
		}
	}
}
