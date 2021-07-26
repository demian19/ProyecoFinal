<?php
session_start();
if($_SESSION['auth'] == true){


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> Formulario de alta autor </title>
		<script src="validacion_autor.js"></script>
		<link rel = "stylesheet" type="text/css" href="css/estilo_form_autor.css"/> 
	</head>
	<body>
		<h1> Formulario de alta de autor </h1>
		<p> Favor de ingresar los siguientes datos: </p>
		<form name ="alta" id="formulario" action='alta_autor.php' method="post" onsubmit='return validarFormulario()'>

			<label for="nombre_autor">Nombre del autor: </label>
			<input type="text" name ="nombre_autor" id ="nombre_autor"><br/>
			<label for="apaterno_autor">Apellido Paterno : </label>
			<input type="text" name ="apaterno_autor" id ="apaterno_autor"><br/>
			<label for="amaterno_autor">Apellido Materno:</label>
			<input type="text" name="amaterno_autor"></br>
			<input type= "submit"  value ="Guardar">
		</form>
	</body>
</html>

<?php
}else
	header ('Location: iniciosesion.php');
?>
