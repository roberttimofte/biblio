<?php
include 'db_connection.php';

$isbn = $_POST['isbn'];
$autore = $_POST['autore'];
$libro = $_POST['libro'];

$sql = "INSERT INTO libri (isbn, autore, libro) VALUES ('$isbn', '$autore', '$libro')";

if (mysqli_query($connessione, $sql)) {
    echo "ok";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connessione);
}

mysqli_close($connessione);

?> 
