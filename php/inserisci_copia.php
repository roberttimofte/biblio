<!DOCTYPE html>

<html>

	<head>
		<meta charset="UTF-8">
		
		<script src="../js/jquery-3.2.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		
		<title>Inserisci copia</title>
		
	</head>

	<body>
	
		<nav class="navbar navbar-expand-sm bg-light">
			
			<a class="navbar-brand" href="../index.php">Logout</a>
			
			<ul class="navbar-nav mr-auto">
				<li class="nav-item nav-link">
					<a class="nav-link" href="inserisci_libro.php">Inserisci libro</a>
				</li>
				<li class="nav-item nav-link">
					<a class="nav-link" href="inserisci_autore.php">Inserisci autore</a>
				</li>
				<li class="nav-item nav-link active">
					<a class="nav-link" href="#">Inserisci copia</a>
				</li>
			</ul>
		</nav>
		
		<div class="container">
		
			</br><h2>Inserisci copia</h2></br>
			
			<form>
			
				<div class="form-group row">
					<label for="titolo" class="col-sm-2 col-form-label">Libro</label>
					<div class="col-sm-4 ">
						<select class="form-control" id="libri" name="libri">
							<option disabled selected value></option>
							<?php
								include 'db_connection.php';
								
								$sql = "SELECT MATCont, MATTitolo FROM biblio_mat";
								$result = mysqli_query($connessione, $sql);
								
								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										echo "<option value=" . $row['MATCont'] . ">" . $row["MATTitolo"] . "</option>";
									}
								} else {
									echo "<option>None</option>";
								}

								mysqli_close($connessione);
							?>
						</select>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="autore" class="col-sm-2 col-form-label">INV Generale</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" placeholder="inv generale" name="inv_generale">
					</div>
				</div>
				
				<div class="form-group row">
					<label for="libro" class="col-sm-2 col-form-label">Collocazione</label>
					<div class="col-sm-1">
						<select class="form-control" id="collocazione" name="collocazione">
							<option disabled selected value></option>
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

								mysqli_close($connessione);
							?>
						</select>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="libro" class="col-sm-2 col-form-label">Posto</label>
					<div class="col-sm-8 ">
						<input type="text" class="form-control" placeholder="posto" name="posto">
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

		<script>
			$(function() {
				$('form').submit(function() {
					$.ajax({
						type: 'POST',
						url: 'insert_copy.php',
						data: $(this).serialize(),
						success: function(data) {
							if (data == "ok"){
								$('#alert').show();
								$('#alert').attr("class", "alert alert-success a");
								$('#alert_msg').text('Ok! Copia inserita');
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
		</script>

	</body>

</html>