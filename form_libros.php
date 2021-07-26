<?php
session_start();
if($_SESSION['auth'] == true){

$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=web123")or die(pg_last_error());

$query = "select id_autor, nombre_autor, apaterno_autor from autor";
$query_editorial = "select id_editorial, nombre_editorial from editorial";
$query = pg_query($con,$query) or die(pg_last_error());
$query_editorial = pg_query($con,$query_editorial) or die(pg_last_error());
$arreglo = pg_fetch_all($query_editorial);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title> Formulario de alta libros </title>
		<script src="validacion_libro.js"></script>
		<link rel="stylesheet" type="text/css" href="css/estilo_form_libro.css"/>
	</head>
	<body>
		<h1> Formulario de alta de libros </h1>
		
		<p> Favor de ingresar los siguientes datos: </p>
		<form name ="alta" id="formulario" action='alta.php' method="post" onsubmit ='return validarFormulario()'>
			<label for="nombre_libro">Nombre del libro: </label>
			<input type="text" name ="nombre_libro" id ="nombre_libro"><br/>
			<label for="edicion_libro">Edicion : </label>
			<input type="text" name ="edicion_libro" id ="edicion_libro"><br/>
			<label for="anio_edicion">Año de publicación:</label>
			<input type="text" name="anio_publicacion" id ="anio_publicacion"></br>
			<label for="nombre_editorial">Editorial : </label>
			<select name ="id_editorial" id ="id_editorial">
			<option value="0"> Seleccionar editorial </option>
				<?php
				while($row_editorial = pg_fetch_array($query_editorial))
				{
				?>
				<option value= "<?php echo $row_editorial['id_editorial']?>"> <?php echo $row_editorial['nombre_editorial']?></option>
			<?php
 			}
			?>
			</select></td>
			<a href='form_editorial.php'>Agregar nueva editorial</a></br>
			<label for ="nombre_autor"> Nombre autor : </label>
			<select name="id_autor" id = "id_autor">
			<option value ="0"> Seleccionar autor </option>
				<?php
				while($row_libro = pg_fetch_array($query)){
				?>
				<option value ="<?php echo $row_libro['id_autor'] ?>"> <?php echo $row_libro['nombre_autor']." ".$row_libro['apaterno_autor']?> </option>
				<?php
				}
				?>
			</select></td>
			<a href ='form_autor.php'>Agregar nuevo autor</a></br>
			<input type= "submit" value ="Guardar">
		</form>
	</body>
</html>

<?php
}else
	header ('Location: iniciosesion.php');
?>*/
