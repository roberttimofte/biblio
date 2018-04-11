<!DOCTYPE html> 

<?php
session_start();
if(!isset($_SESSION['login_user'])){
	session_destroy();
	session_start();
	$_SESSION['login_error'] = "Username o password errati";
    header("Location: ../index.php");
} else {
	if($_SESSION['login_user'] == "0")  {
		session_destroy();
		session_start();
		$_SESSION['login_error'] = "Username o password errati";
		header("Location: ../index.php");
    }
}
?>

<html>

	<head>
		<meta charset="UTF-8">
		
		<style>
		.modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-cont {
			position: relative;
			background-color: #fefefe;
			margin: auto;
			padding: 0;
			border: 1px solid #888;
			width: 75%;
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
			-webkit-animation-name: animatetop;
			-webkit-animation-duration: 0.4s;
			animation-name: animatetop;
			animation-duration: 0.4s
		}

		/* Add Animation */
		@-webkit-keyframes animatetop {
			from {top:-300px; opacity:0} 
			to {top:0; opacity:1}
		}

		@keyframes animatetop {
			from {top:-300px; opacity:0}
			to {top:0; opacity:1}
		}

		/* The Close Button */
		.close {
			color: white;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.close:hover,
		.close:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}

		.modal-header {
			padding: 2px 16px;
			background-color: #5cb85c;
			color: white;
		}

		.modal-body {padding: 2px 16px;}

		.modal-footer {
			padding: 2px 16px;
			background-color: #5cb85c;
			color: white;
		}
		</style>
	
		<script src="../js/jquery-3.2.1.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		
		<title>Inserisci libro</title>
		
	</head>

	<body>
	
		<nav class="navbar navbar-expand-sm bg-light">
			
			<a class="navbar-brand" href="../index.php">Logout</a>
			
			<ul class="navbar-nav mr-auto">
				<li class="nav-item nav-link active">
					<a class="nav-link" href="#">Inserisci libro</a>
				</li>
				<li class="nav-item nav-link">
					<a class="nav-link" href="inserisci_autore.php">Inserisci autore</a>
				</li>
				<li class="nav-item nav-link">
					<a class="nav-link" href="inserisci_copia.php">Inserisci copia</a>
				</li>
			</ul>
		</nav>
		
		<div class="container">
		
			</br><h2>Inserisci libro</h2></br>
			
			<form id="insert_book">
				
				<div class="form-group row">
					<label for="titolo" class="col-sm-2 col-form-label">Titolo</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" placeholder="titolo" name="titolo">
					</div>
				</div>
				
				<div class="form-group row">
					<label for="sottotitolo" class="col-sm-2 col-form-label">Sottotitolo</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" placeholder="sottotitolo" name="sottotitolo">
					</div>
				</div>
				
				<div class="form-group row">
					<label for="tipo_materiale" class="col-sm-3 col-form-label">Tipo materiale</label>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="libro" name="type">
						<label class="form-check-label">Libro</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="fotocopia" name="type">
						<label class="form-check-label">Fotocopia</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="dizionario" name="type">
						<label class="form-check-label">Dizionario</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="rivista" name="type">
						<label class="form-check-label">Rivista</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="cd-rom" name="type">
						<label class="form-check-label">CD-ROM</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="dispensa" name="type">
						<label class="form-check-label">Dispensa</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="altro" name="type">
						<label class="form-check-label">Altro</label>
					</div>
				</div>
				
				
				<div class="form-group row">
					<label for="editrice" class="col-sm-2 col-form-label">Casa editrice</label>
					<div class="col-sm-8 ">
						<select class="form-control" id="editrice" name="editrice">
							<option></option>
							<?php
								include 'db_connection.php';
								
								$sql = "SELECT EDITRICERagSoc FROM biblio_editrice";
								$result = mysqli_query($connessione, $sql);
								
								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										echo "<option>" . $row["EDITRICERagSoc"] . "</option>";
									}
								} else {
									echo "<option>None</option>";
								}

								mysqli_close($conn);
							?>
						</select>
					</div>
					<input type="button" id="myBtn" value="Inserisci editrice">
					
					<div id="myModal" class="modal">
					  <!-- Modal content -->
						<div class="modal-cont">
							<div class="modal-body">
								<span id="close1" class="close">&times;</span><br>
								<div class="container">
		
									</br><h2>Inserisci editrice</h2></br>
									
									<form id="insert_editor">
									
										<div class="form-group row">
											<label for="ragione_sociale" class="col-sm-2 col-form-label">Ragione sociale</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" placeholder="ragione sociale" name="rag_soc">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="indirizzo" class="col-sm-2 col-form-label">Indirizzo</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" placeholder="indirizzo" name="indirizzo">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="cap" class="col-sm-2 col-form-label">Cap</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" placeholder="cap" name="cap">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="cap" class="col-sm-2 col-form-label">Città</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" placeholder="città" name="citta">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="rappr" class="col-sm-2 col-form-label">Rappresentante</label>
											<div class="col-sm-8">
												<select class="form-control" id="rappr" name="rappr">
													<option></option>
													<?php
													?>
												</select>
											</div>
										</div>
										
										<div class="form-group row">
											<div class="offset-sm-2 col-sm-10">
												<button type="submit" class="btn btn-primary" value="Send">Inserisci</button>
											</div>
										</div>

										<div class="" id="alert_editor" style="visibility:hidden;">
											<p id="alert_msg_editor"></p>
										</div>
										
									</form>
								</div>
								<!--<script>
									$(function() {
										$('#insert_editor').submit(function() {
											$.ajax({
												type: 'POST',
												url: 'insert_author.php',
												data: $(this).serialize(),
												success: function(data) {
													if (data == "ok"){
														$('#alert_editor').show();
														$('#alert_editor').attr("class", "alert alert-success a");
														$('#alert_msg_editor').text('Ok! Libro inserito');
														$('#alert_editor').css({
														visibility:'visible'
														});
														$('#alert_editor').delay(1000).fadeOut();
													}else{
														$('#alert_editor').show();
														$('#alert_editor').attr("class", "alert alert-danger");
														$('#alert_msg_editor').text('Opss! Si è verificato un problema');
														$('#alert_editor').css({
														visibility:'visible'
														});
														$('#alert_ed').delay(1000).fadeOut();
													}  
												}
											});
											return false;
										}); 
									})
								</script>-->
							</div>
						</div>
					</div>
				</div>
				
				
				<div class="form-group row">
					<label for="anno_edizione" class="col-sm-2 col-form-label">Anno edizione</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" placeholder="anno edizione" name="anno_edizione">
					</div>
					<label for="luogo_edizione" class="col-sm-2 col-form-label" style="text-align: right">Luogo edizione</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" placeholder="luogo edizione" name="luogo_edizione">
					</div>
					<label for="num_edizione" class="col-sm-2 col-form-label" style="text-align: right">Num edizione</label>
					<div class="col-sm-1">
						<input type="text" class="form-control" placeholder="num" name="num_edizione">
					</div>
				</div>
				
				<div class="form-group row">
					<label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" placeholder="isbn" name="isbn" maxlength="13">
					</div>
				</div>
				
				<div class="form-group row">
					<label for="numero_volume" class="col-sm-2 col-form-label">Numero volume</label>
					<div class="col-sm-1">
						<input type="text" class="form-control" placeholder="n vol" name="num_volume">
					</div>
					<label for="totale_volumi" class="col-sm-2 col-form-label" style="text-align: right">Totale volumi</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" placeholder="tot vol" name="tot_volumi">
					</div>
					<label for="numero_pagine" class="col-sm-2 col-form-label" style="text-align: right">Numero pagine</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" placeholder="n pag" name="num_paginee">
					</div>
				</div>
				
				<div class="form-group row">
					<label for="abstract" class="col-sm-2 col-form-label">Abstract</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" placeholder="abstract" name="abstract">
					</div>
				</div>
				
				<div class="form-group row">
					<label for="inv_generale" class="col-sm-2 col-form-label">INV Generale</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" placeholder="inv generale" name="inv">
					</div>
					<label for="collocazione" class="col-sm-1 col-form-label">Collocazione</label>
					<div class="col-sm-1">	
						<select class="form-control" id="collocazione" name="collocazione">
							<option></option>
							<?php
								include 'db_connection.php';
								
								$sql = "SELECT COLLDescr FROM biblio_coll";
								$result = mysqli_query($connessione, $sql);
								
								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										echo "<option>" . $row["COLLDescr"] . "</option>";
									}
								} else {
									echo "<option>None</option>";
								}

								mysqli_close($conn);
							?>
						</select>
					</div>
					<label for="progr" class="col-sm-1 col-form-label" style="text-align: right">Progr</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" placeholder="progr" name="progr">
					</div>
					<label for="num" class="col-sm-1 col-form-label" style="text-align: right">Num</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" placeholder="num" name="num">
					</div>
				</div>
				
				<div class="form-group row">
					<label for="autore" class="col-sm-2 col-form-label">Autore</label>
					<div class="col-sm-8">
						<select class="form-control" id="autore" name="autore">
							<option></option>
							<?php
								include 'db_connection.php';
								
								$sql = "SELECT AUTORECognome, AUTORENome FROM biblio_autore";
								$result = mysqli_query($connessione, $sql);
								
								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										echo "<option>" . $row["AUTORECognome"] . " " . $row["AUTORENome"] . "</option>";
									}
								} else {
									echo "<option>None</option>";
								}

								mysqli_close($conn);
							?>
						</select>
					</div>
					<input type="button" id="myBtn2" value="Nuovo autore">
					
					<div id="myModal2" class="modal">
					  <!-- Modal content -->
						<div class="modal-cont">
							<div class="modal-body">
								<span id="close2" class="close">&times;</span><br>
								<div class="container">
								
									</br><h2>Inserisci autore</h2></br>
									
									<form id="insert_author">
									
										<div class="form-group row">
											<label for="titolo" class="col-sm-2 col-form-label">Cognome</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" placeholder="cognome" name="cognome">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="autore" class="col-sm-2 col-form-label">Nome</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" placeholder="nome" name="nome">
											</div>
										</div>
										
										<div class="form-group row">
											<div class="offset-sm-2 col-sm-10">
												<button type="submit" class="btn btn-primary" value="Send">Inserisci</button>
											</div>
										</div>

										<div class="" id="alert_author" style="visibility:hidden;">
											<p id="alert_msg_author"></p>
										</div>
										
									</form>
									
								</div>
								
								<script>
									$(function() {
										$('#insert_author').submit(function() {
											$.ajax({
												type: 'POST',
												url: 'insert_author.php',
												data: $(this).serialize(),
												success: function(data) {
													if (data == "ok"){
														$('#alert_author').show();
														$('#alert_author').attr("class", "alert alert-success a");
														$('#alert_msg_author').text('Ok! Autore inserito');
														$('#alert_author').css({
														visibility:'visible'
														});
														$('#alert_author').delay(1000).fadeOut();
													}else{
														$('#alert_author').show();
														$('#alert_author').attr("class", "alert alert-danger");
														$('#alert_msg_author').text('Opss! Si è verificato un problema');
														$('#alert_author').css({
														visibility:'visible'
														});
														$('#alert_author').delay(1000).fadeOut();
													}  
												}
											});
											return false;
										}); 
									})
								</script>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<div class="offset-sm-2 col-sm-10">
						<button type="submit" class="btn btn-primary" value="Send">Inserisci</button>
					</div>
				</div>

				<div class="" id="alert" style="visibility:hidden;">
					<p id="alert_msg"></p>
				</div>
				
			</form>
			
		</div>
		
		<!--<h1 align="center">WORK IN PROGRESS</h1>-->
		<!--<script>
			$(function() {
				$('#insert_book').submit(function() {
					$.ajax({
						type: 'POST',
						url: 'insert_book.php',
						data: $(this).serialize(),
						success: function(data) {
							if (data == "ok"){
								$('#alert').show();
								$('#alert').attr("class", "alert alert-success a");
								$('#alert_msg').text('Ok! Libro inserito');
								$('#alert').css({
								visibility:'visible'
								});
								$('#alert').delay(1000).fadeOut();
							}else{
								$('#alert').show();
								$('#alert').attr("class", "alert alert-danger");
								$('#alert_msg').text('Opss! Si è verificato un problema');
								$('#alert').css({
								visibility:'visible'
								});
								$('#alert').delay(1000).fadeOut();
							}  
						}
					});
					return false;
				}); 
			})
		</script>-->
		
		<script>
		// Get the modal
		var modal = document.getElementById('myModal');
		var modal2 = document.getElementById('myModal2');

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");
		var btn2 = document.getElementById("myBtn2");

		// Get the <span> element that closes the modal
		var span = document.getElementById("close1");
		var span2 = document.getElementById("close2");

		// When the user clicks on the button, open the modal 
		btn.onclick = function() {
			modal.style.display = "block";
		}

		btn2.onclick = function() {
			modal2.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			modal.style.display = "none";
		}
		
		span2.onclick = function() {
			modal2.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
			if (event.target == modal2) {
				modal2.style.display = "none";
			}
		}
		</script>

	</body>

</html>
