<!DOCTYPE html>
<?php
session_start();

$_SESSION['login_user'] = 0;
?>
<html>

	<head>
		<meta charset="UTF-8">
		
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/form-style.css">
		<link rel="stylesheet" href="css/search-bar-style.css">

		
		<title>BIBLIO</title>

	</head>

	<body style="background-image: url(img/bg.jpg); background-size: cover; background-repeat: no-repeat">
	
		<div align="center" style="font-family: sans-serif; font-size: 3em; font-weight: 100; letter-spacing: 0.40em; text-align: center;">
			<!--<h1 style="color: white">BIBLIO</h1>-->
			<img src="img/logo.png" width="500px"/>
		</div><br>
			
		<div class="form-style-6">
			<h1>Accedi</h1>
			<form action="php/ldap_login.php" method="POST">
				<input type="text" name="username" placeholder="username" required>
				<input type="password" name="password" placeholder="password" required>
				<input type="submit" name="login" value="Conferma"/>
			</form><br>
			<?php
				if (isset($_SESSION['login_error']) and ($_SESSION['login_error']) != "") {
					echo "<p style='color: red' align='center'>" .$_SESSION["login_error"]. "</p>";
					unset($_SESSION['login_error']);
				}
			?>
		</div><br><br>
		
		<!--<div align="center">
			<span style="color: #ffffff; text-align: center; font-family: 'Garamond'; font-size: 50px;">Oppure</span>
		</div>
		
		<div class="box">
		  <div class="container-1">
			  <span class="icon"><i class="fa fa-search"></i></span>
			  <input type="search" id="search" placeholder="Cerca..." />
		  </div>
		</div>-->

		<!--script>
			$(".btn.btn-dark").click(function() {
				window.location = "php/inserisci_libro.php";
			});
		</script>-->

	</body>

</html>
