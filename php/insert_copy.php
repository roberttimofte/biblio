<?php
include 'db_connection.php';

$libro = $_POST['libri'];
$inv_generale = $_POST['inv_generale'];
$collocazione = $_POST['collocazione'];
$posto = $_POST['posto'];

$sql = "INSERT INTO copie (libro, inv_generale, collocazione, posto)  VALUES ('$libro', '$inv_generale', '$collocazione', '$posto')";

if (mysqli_query($connessione, $sql)) {
    echo "ok";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connessione);
}

mysqli_close($connessione);

?>