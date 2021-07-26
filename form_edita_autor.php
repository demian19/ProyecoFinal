<?php
session_start();
if($_SESSION['auth'] == true){

$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=web123")or die(pg_last_error());
$id = $_GET['id'];
$query = "select id_autor, nombre_autor, apaterno_autor, amaterno_autor from autor where id_autor='".$id."'";
$query = pg_query($con,$query) or die(pg_last_error());
$resultado = pg_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> Formulario de editar autor </title>
		<script src="validacion_autor.js"></script>
		<link rel="stylesheet" type="text/css" href="css/estilo_form_libro.css"/>
	</head>
	<body>
		<h1> Formulario de edición de autor </h1>
		<p> Favor de editar los  datos que se encuentran erroneamente: </p>
		<form id="formulario" name ="guarda_edicion_autor" action="guarda_edicion_autor.php" method="post" onsubmit='return validarFormulario()'>
		<label for ="nombre_autor"> Nombre autor : </label>
		<input type="text" name="nombre_autor" value="<?php echo $resultado['nombre_autor'];?>"></br>
		<label for ="apaterno_autor"> Apellido paterno : </label>
		<input type="text" name="apaterno_autor" value="<?php echo $resultado['apaterno_autor']; ?>"></br>
		<label for="amaterno_autor"> Apellido materno : </label>
		<input type="text" name="amaterno_autor" value="<?php echo $resultado['amaterno_autor'];?>"></br>
		<input type="hidden" name ="id_autor" value="<?php echo $resultado['id_autor'];?>"></br>
		<input type= "submit" value ="Actualizar">
		</form>
	</body>
</html>

<?php
}else
	header ('Location: inicio.php');
?>
