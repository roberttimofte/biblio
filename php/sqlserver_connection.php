<?php
/*try {
	$driver = "{SQL Server}";
	$db = new PDO("odbc:Driver=$driver;sqlsrv:Server=172.16.1.27;Database=db4at", "quartaat", "quartaat");
	echo "Connection successful!";
} catch(Exception $e) {
	echo "Error! " .$e->getMessage();
}*/

$serverName = "172.16.1.27"; //serverName\instanceName
$connectionInfo = array( "Database"=>"db4at", "UID"=>"quartaat", "PWD"=>"quartaat");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>