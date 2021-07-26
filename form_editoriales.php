<?php
session_start();
if($_SESSION['auth'] == true){


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> Formulario de alta editorial </title>
		<script src="validacion_editorial.js"></script>
		<link rel="stylesheet" type="text/css" href="css/estilo_form_editorial.css"/>
	</head>
	<body>
		<h1> Formulario de alta de editorial </h1>
		<p> Favor de ingresar los siguientes datos: </p>
		<form name ="alta" id="formulario" action='alta_editoriales.php' method="post" >
			<label for="nombre_editorial">Nombre de la editorial: </label>
			<input type="text" name ="nombre_editorial" id ="nombre_editorial"><br/>
			<label for="pais_editorial">País de la editorial: </label>
			<input type="text" name ="pais_editorial" id ="pais_editorial"><br/>
			<input type= "submit" onclick ='return validarFormulario();' value ="Guardar">
		</form>
	</body>
</html>

<?php
}else
	header ('Location: iniciosesion.php');
?>
