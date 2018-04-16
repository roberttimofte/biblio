<?php
include 'db_connection.php';

$titolo = $_POST['titolo'];
$sottotitolo = $_POST['sottotitolo'];
if(isset($_POST['type'])) {
	$tipo = $_POST['type'];
} else {
	$tipo = '';
}
if(isset($_POST['editrice'])) {
	$editrice = $_POST['editrice'];
} else {
	$editrice = '';
}
$anno = $_POST['anno_edizione'];
$luogo = $_POST['luogo_edizione'];
$num_edizione = $_POST['num_edizione'];
$isbn = $_POST['isbn'];
$num_vol = $_POST['num_volume'];
$tot_vol = $_POST['tot_volumi'];
$num_pagine = $_POST['num_pagine'];
$abstract = $_POST['abstract'];
$inv = $_POST['inv'];
if(isset($_POST['collocazione'])) {
	$collocazione = $_POST['collocaione'];
} else {
	$collocazione = '';
}
$progr = $_POST['progr'];
$num = $_POST['num'];
$autore = $_POST['autore'];


$sql = "INSERT INTO biblio_mat (MATTitolo, TIPOMATCont, EDITRICECont, MATAnnoEdizione, MATLuogoEdizione, MATNumEdizione, MATISBN, MATNumVolume, MATTotVolumi, MATNumPagine, MATAbstaract, MATSottotitolo) VALUES ('$titolo', $tipo, $editrice, $anno, '$luogo', $num_edizione, '$isbn', $num_vol, $tot_vol, $num_pagine, '$abstract', '$sottotitolo')";

if (mysqli_query($connessione, $sql)) {
    echo "ok";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connessione);
}

mysqli_close($connessione);

?>