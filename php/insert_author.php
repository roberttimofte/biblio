<?php
include 'db_connection.php';

$cognome = $_POST['cognome'];
$nome = $_POST['nome'];

$sql = "INSERT INTO biblio_autore (AUTORECognome, AUTORENome) VALUES ('$cognome', '$nome')";

if (mysqli_query($connessione, $sql)) {
    echo "ok";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connessione);
}

mysqli_close($connessione);

?>