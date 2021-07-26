<?php
session_start();
if($_SESSION['auth'] == true){
$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=web123")or die(pg_last_error());
$id = $_GET['id'];
$query_editorial = "select id_editorial, nombre_editorial, pais_editorial from editorial where id_editorial ='".$id."'";
$query_editorial = pg_query($con,$query_editorial) or die(pg_last_error());
$resultado = pg_fetch_assoc($query_editorial);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> Formulario de eliminación de editorial: </title>
		<meta name="viewport" content ="width=device-width, initial-scale=1"/>
		<!--<script src="js/primero.js"></script>-->
		<link rel="stylesheet" type="text/css" href="css/estilo_form_libro.css"/>
	</head>
	<body>
		<h1> Formulario de eliminación de editorial </h1>
		<p> A continuación se eliminarán los siguientes datos: </p>
		<form name ="baja" id ="formulario" action="elimina_editorial.php" method="post" >
			<label for="nombre_editorial">Nombre de editorial: </label>
			<?php echo $resultado['nombre_editorial'];?><br/>
			<label for="pais_editorial">Pais : </label>
			<?php echo $resultado['pais_editorial'];?><br/>
			<input type ="hidden" name="id_editorial" value="<?php echo $resultado['id_editorial'];?>"</br>
			<input type= "submit" onclick= "return confirm('¿Estás seguro de elminiar la editorial? Una vez eliminado no podrá recuperarlo');" value ="Eliminar">
		</form>
	</body>
</html>

<?php
}else
	header ('Location: iniciosesion.php');
?>
