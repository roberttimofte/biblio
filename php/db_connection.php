<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblio";

// Create connection
$connessione = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connessione) {
    die("Connessione fallita: " . mysqli_connect_error());
} else {
	//echo "Connessione riuscita!";
}

?>