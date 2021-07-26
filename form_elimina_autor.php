<?php
session_start();
if($_SESSION['auth'] == true){

$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=web123")or die(pg_last_error());
$id = $_GET['id'];
$query = "select id_autor, nombre_autor, apaterno_autor, amaterno_autor from autor where id_autor ='".$id."'";
$query = pg_query($con,$query) or die(pg_last_error());
$resultado = pg_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> Formulario de eliminación de autor </title>
		<meta name="viewport" content ="width=device-width, initial-scale=1"/>
		<!--<script src="js/primero.js"></script>-->
		<link rel="stylesheet" type="text/css" href="css/estilo_form_libro.css"/>
	</head>
	<body>
		<h1> Formulario de eliminación de autor </h1>
		<p> A continuación se eliminarán los siguientes datos: </p>
		<form name ="baja" id ="formulario" action="elimina_autor.php" method="post" >
			<label for="nombre_autor">Nombre del autor: </label>
			<?php echo $resultado['nombre_autor'];?><br/>
			<label for="apaterno_autor">Apellido paterno : </label>
			<?php echo $resultado['apaterno_autor'];?><br/>
			<label for="amaterno_autor">Apellido materno:</label>
			<?php echo $resultado['amaterno_autor'];?></br>
			<input type ="hidden" name="id_autor" value="<?php echo $resultado['id_autor'];?>"></br>
			<input type= "submit" onclick= "return confirm('¿Estás seguro de elminiar el autor? Una vez eliminado no podrá recuperarlo');" value ="Eliminar">
		</form>
	</body>
</html>

<?php
}else
	header ('Location: iniciosesion.php');
?>
