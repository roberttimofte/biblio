<?php
include "db_connection.php";

session_start();

$msg = True;

if ($_POST["username"] != "" && $_POST["password"] != "") {
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$sql = "SELECT username, password FROM users";
	$result = mysqli_query($connessione, $sql);
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			if ($username == $row["username"] && $password == $row["password"]) {
				header("Location: inserisci_libro.php");
			} else {
				$_SESSION["login_error"] = "Username o password errati";
				$msg = False;
			}
		}
		if ($msg == False) {
			header("Location: ../index.php");
		}
	}	
}
?>