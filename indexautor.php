<?php
session_start();
if($_SESSION['auth'] == true){
$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=web123") or die(pg_last_error());

if($con){
	//echo "se abre la conexióna la BD";
	$query= "select * from autor";	
	$query = pg_query($con,$query) or die(pg_last_error());
	$arreglo =pg_fetch_all($query);
	if($query){

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Catálogo autor </title>
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
<h2> Catálogo autor </h2>
<table>
	<thead>
		<tr>
			<th>Nombre del autor</th>
			<th>Apellido Paterno</th>
			<th>Apellido Materno</th>
		</tr>
	</thead>
	<tbody>
<?php
	while($row =pg_fetch_array($query)){
		echo "<tr>";
		echo "<td>".$row['nombre_autor']."</td>";
		echo "<td>".$row['apaterno_autor']."</td>";
		echo "<td>".$row['amaterno_autor']."</td>";
		echo "<td><a href='form_edita_autor.php?id=".$row['id_autor']."'>Editar</a></td>";
		echo "<td><a href='form_elimina_autor.php?id=".$row['id_autor']."'>Eliminar</a></td>";
		echo "</tr>";
	}
?>	
	</tbody>
</table>
</div>
</body>
</html>
<?php
	echo "<a href='form_autores.php'> Nuevo autor</a></br>";
	}else{
		echo "No se pudo ejecutar la sentencia SQL";
	}
} else{
	echo "Hubo un error";
}
}else{
	header('Location: iniciosesion.php');
}
?>

