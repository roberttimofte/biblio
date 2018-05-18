<!DOCTYPE html>	

<html>

	<head>
		<meta charset="UTF-8">
		
		<script src="../js/jquery-3.2.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		
		<title>Inserisci autore</title>
		
	</head>

	<body>
	
		<nav class="navbar navbar-expand-sm bg-light">
			
			<a class="navbar-brand" href="../index.php">Logout</a>
			
			<ul class="navbar-nav mr-auto">
				<li class="nav-item nav-link">
					<a class="nav-link" href="inserisci_libro.php">Inserisci libro</a>
				</li>
				<li class="nav-item nav-link active">
					<a class="nav-link" href="#">Inserisci autore</a>
				</li>
				<li class="nav-item nav-link">
					<a class="nav-link" href="inserisci_copia.php">Inserisci copia</a>
				</li>
			</ul>
		</nav>

		<div class="container">
		
			</br><h2>Inserisci autore</h2></br>
			
			<form>
			
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
						url: 'insert_author.php',
						data: $(this).serialize(),
						success: function(data) {
							if (data == "ok"){
								$('#alert').show();
								$('#alert').attr("class", "alert alert-success a");
								$('#alert_msg').text('Ok! Autore inserito');
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