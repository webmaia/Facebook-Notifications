<?php
	
	date_default_timezone_set('America/Bogota');
	echo $fecha= Date("d/m/Y");	
	// Imprime algo como: Monday
	
	//echo $fecha=Date(time());

	$source = '2012-07-31';
	$date = new DateTime($source);
	$fecha=$date->format('d/m/Y');

	var_dump($fecha);
?>