<?php
	$serverName = "xak2ftvng9.database.windows.net,1433"; //serverName\instanceName, portNumber (por defecto es 1433)
	$connectionInfo = array( "Database"=>"girubd", "UID"=>"girubd", "PWD"=>"Angelkurten93");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	if( $conn ) {
?>
	<script>console.log('Conexión establecida.')</script>
<?php
	}else{
?>	
	     <script>console.log(<?php die( print_r( sqlsrv_errors(), true)); ?>)</script>
?>
	}
?>