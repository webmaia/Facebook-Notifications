<?php

   	$serverName = "xak2ftvng9.database.windows.net,1433"; //serverName\instanceName, portNumber (por defecto es 1433)
	$connectionInfo = array( "Database"=>"girubd", "UID"=>"girubd", "PWD"=>"Angelkurten93");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	if( $conn ) {
	     echo "Conexión establecida.<br />";
	}else{
	     echo "Conexión no se pudo establecer.<br />";
	     die( print_r( sqlsrv_errors(), true));
	}

	/*$sql = "INSERT INTO usuarios (id, username) VALUES (?, ?)";
	$params = array(1, "prueba");

	$stmt = sqlsrv_query( $conn, $sql, $params);
	if( $stmt === false ) {
	     die( print_r( sqlsrv_errors(), true));
	}*/

	/*$sql = "SELECT * FROM usuarios";

	$stmt = sqlsrv_query( $conn, $sql);
	if( $stmt === false ) {
	     die( print_r( sqlsrv_errors(), true));
	}

	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['id'].", ".$row['username']."<br />";
	}*/

	$sql = "SELECT * FROM usuarios WHERE id=2";

	$stmt = sqlsrv_query( $conn, $sql);
	if( $stmt === false ) {
	     die( print_r( sqlsrv_errors(), true));
	}

	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['id'].", ".$row['username']."<br />";
	}