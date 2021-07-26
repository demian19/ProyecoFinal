<?php
session_start();
if($_SESSION['auth'] == true){

$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=web123")or die(pg_last_error());

$query = "select id_autor, nombre_autor, apaterno_autor from autor";
$query_editorial = "select id_editorial, nombre_editorial from editorial";
$query = pg_query($con,$query) or die(pg_last_error());
$query_editorial = pg_query($con,$query_editorial) or die(pg_last_error());
$id = $_GET['id'];	
$query_libro = "select l.id_libro,l.nombre_libro, l.anio_publicacion,l.edicion_libro,a.nombre_autor, a.apaterno_autor,a.amaterno_autor,e.nombre_editorial from libro as l INNER JOIN autor as a ON l.id_autor = a.id_autor INNER JOIN editorial as e ON l.id_editorial = e.id_editorial where id_libro ='".$id."'";
$query_libro = pg_query($con,$query_libro) or die(pg_last_error());
$resultado = pg_fetch_assoc($query_libro);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> Formulario de eliminación de libros </title>
		<meta name="viewport" content ="width=device-width, initial-scale=1"/>
		<!--<script src="js/primero.js"></script>-->
		<link rel="stylesheet" type="text/css" href="css/estilo_form_libro.css"/>
	</head>
	<body>
		<h1> Formulario de edición de libros </h1>
		<p> A continuación se eliminarán los siguientes datos: </p>
		<form name ="baja" id ="formulario" action="elimina_libro.php" method="post" >
			<label for="nombre_libro">Nombre del libro: </label>
			<?php echo $resultado['nombre_libro'];?><br/>
			<label for="edicion_libro">Edicion : </label>
			<?php echo $resultado['edicion_libro'];?><br/>
			<label for="anio_edicion">Año de publicación:</label>
			<?php echo $resultado['anio_publicacion'];?></br>
			<label for="nombre_editorial">Editorial : </label>
		        <?php echo $resultado['nombre_editorial'];?></br>
			<label for ="nombre_autor"> Nombre autor : </label>
			<?php echo $resultado['nombre_autor']." ".$resultado['apaterno_autor'];?></br>
			<input type ="hidden" name="id_libro" value="<?php echo $resultado['id_libro'];?>"</br>
			<input type= "submit" onclick= "return confirm('¿Estás seguro de elminiar el libro? Una vez eliminado no podrá recuperarlo');" value ="Eliminar">
		</form>
	</body>
</html>

<?php
}else
	header ('Location: iniciosesion.php');
?>
