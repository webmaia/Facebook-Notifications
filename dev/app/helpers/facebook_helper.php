<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('enviar_notificacion'))
{
	function enviar_notificacion($mensaje, $destino,$href='?live=yes')
	{
		

		if (is_array($destino))
		{
	        $params = array(
	           'href' => $href,
                'template' => $mensaje,
            );
			
			while($destino) {
              $facebook->api('/' . $destino['id'] . '/notifications/', 'post', $params);
          	}
		}
	}
}
