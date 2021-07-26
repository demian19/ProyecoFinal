<?php
session_start();
if($_SESSION['auth'] == true){
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Créditos</title>
		<meta name ="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/estilo_form_index.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	</head>
<body>
	<div class="topnav" id="myTopnav">
			<a href ="#catalogo" class="active">Catálogo</a>
			<a href ="index.php">Libro</a>
			<a href ="indexautor.php">Autor</a>
			<a href ="indexeditorial.php">Editorial</a>
			<a href ="indexlibroxautor.php">Libro por autor</a>
			<a href ="indexlibroxeditorial.php">Libro por editorial</a>
			<a href ="creditos.php">Créditos</a>
			<a href ="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars"></i>
			</a>
	</div>
	<script>
		function myFunction() {
			
			var x = document.getElementById("myTopnav");
			
			if(x.className === "topnav") {
				x.className += " responsive";
			} else {
				x.className = "topnav";
			}
		}	
	</script>
<div style="overflow-x:auto;">
<h2> Créditos </h2>
<p> Desarrollador: </p>
<p><strong>Luis Bernardo Torres Arellano</strong></p>
<p><strong>Mariana Laura Urzua Borja</strong></p>
<p> Documentador: </p>
<p><strong>Angel Arturo Montiel Monroy </strong></p>
<p><strong>Cesar Castro Alquicira</strong></p>
</div>
</body>
</html>
<?php
}else{
	header('Location: iniciosesion.php');
}
?>

