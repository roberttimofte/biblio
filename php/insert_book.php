<?php
include 'db_connection.php';

$titolo = $_POST['titolo'];
$sottotitolo = $_POST['sottotitolo'];
$tipo = $_POST['type'];
$editrice = $_POST['editrice'];
$anno = $_POST['anno_edizione'];
$luogo = $_POST['luogo_edizione'];
$num_edizione = $_POST['num_edizione'];
$isbn = $_POST['isbn'];
$num_vol = $_POST['num_volume'];
$tot_vol = $_POST['tot_volumi'];
$num_pagine = $_POST['num_pagine'];
$abstract = $_POST['abstract'];
$inv = $_POST['inv'];
$collocazione = $_POST['collocazione'];
$progr = $_POST['progr'];
$num = $_POST['num'];
$autore = $_POST['autore'];

$auth = "";

$sql1 = "SELECT AUTORECognome, AUTORENome FROM biblio_autore WHERE AUTORECont = " . $autore;
$result1 = mysqli_query($connessione, $sql1);
								
if (mysqli_num_rows($result1) > 0) {
	while($row = mysqli_fetch_assoc($result1)) {
		$auth = "";
	}
} else {
	$auth = "";
}

$sql = "INSERT INTO biblio_matnn (MATTitolo, TIPOMATCont, EDITRICECont, MATAnnoEdizione, MATLuogoEdizione, MATNumEdizione, DEWCodice, MATISBN, MATNumVolume, MATTotVolumi, MATNumPagine, MATAbstract, MATSottotitolo) VALUES ('$titolo', $tipo, $editrice, $anno, '$luogo', $num_edizione, 0, '$isbn', $num_vol, $tot_vol, $num_pagine, '$abstract', '$sottotitolo')";

if (mysqli_query($connessione, $sql)) {
    echo "ok";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($connessione);
}

mysqli_close($connessione);

?>