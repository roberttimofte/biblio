<?php
include 'db_connection.php';

$libro = $_POST['libri'];
$inv_generale = $_POST['inv_generale'];
$collocazione = $_POST['collocazione'];
$posto = $_POST['posto'];

$titolo = "";
$isbn = "";

$sql1 = "SELECT MATTitolo, MATISBN FROM biblio_mat WHERE MATCont = " . $libro;
$result1 = mysqli_query($connessione, $sql1);
								
if (mysqli_num_rows($result1) > 0) {
	while($row = mysqli_fetch_assoc($result1)) {
		$titolo = $row['MATTitolo'];
		$isbn = $row['MATISBN'];
	}
} else {
	$titolo = "none";
	$isbn = "0";
}

$sql1 = "INSERT INTO biblio_copia (MATCont, INVENTNum, COPIACollocazione, Progressivo, INVENTGen) VALUES ('$libro', '1','$collocazione', '1', '$inv_generale')";
$sql2 = "INSERT INTO biblio_copiacollocata (Cont, Titolo, Inv, Coll, Prog, ISBN, Expr1) VALUES (1, '$titolo', '$inv_generale', '$collocazione', '1', '$isbn', 1)";
$sql3 = "INSERT INTO biblio_elencocopie (MATCont, INVENTNum, COPIACollocazione, Progressivo) VALUES ('$libro', '$inv_generale','$collocazione', '$posto')";

if (mysqli_query($connessione, $sql1)) {
    echo "ok";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connessione);
}

mysqli_close($connessione);

?>