<?php
session_start();
//script che controlla se il nome utente e la pwd coincidono con quelle dell'LDAP della scuola
//error_reporting(0);
$domain = 'edu.marconi';
$username =  $_POST["username"];       // prendo le credenziali dal form
$password = $_POST["password"];
$ldapconfig['host'] = 'edu-rodc';
$ldapconfig['port'] = 389;            // Porta fissa per l'LDAP
$ldapconfig['basedn'] = 'dc=edu,dc=marconi';

// Controllo nel caso uso un account locale
if($username == "user" and $password == "user"){
	$_SESSION['login_user'] = $username;
	
	if(isset($_SESSION['login_user'])){
		header("Location: inserisci_libro.php");
	}
}

$ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);
ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);

$dn=$ldapconfig['basedn'];
try {
	if($username != "" and $password != ""){        		
		$bind=ldap_bind($ds, $username .'@' .$domain, $password);	
	}
} catch (Exception $e) {
	echo "errore";
}

//$isITuser = ldap_search($bind,$dn,'(&(objectClass=*)(sAMAccountName=' . $username.'))'); // Ricerca delle proprietà !>
if ($bind) {
	$_SESSION['login_user'] = $username;
} 

if(isset($_SESSION['login_user'])){
	header("Location: inserisci_libro.php");
} else {
	$_SESSION['login_error'] = "Username o password errati";
    header("Location: ../index.php"); /* Redirect browser */
}
?>
 
