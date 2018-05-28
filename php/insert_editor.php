<?php
include 'db_connection.php';

$ragsoc = $_POST['rag_soc'];
$indirizzo = $_POST['indirizzo'];
$cap = $_POST['cap'];
$citta = $_POST['citta'];
$rappr = $_POST['rappr'];

$sql = "INSERT INTO biblio_editrice(EDITRICERagSoc, EDITRICEIndirizzo, EDITRICECap, EDITRICECitta, RAPPRCont) VALUES ('$ragsoc', '$indirizzo', '$cap', '$citta', $rappr)";

if (mysqli_query($connessione, $sql)) {
    echo "ok";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connessione);
}

mysqli_close($connessione);
?>