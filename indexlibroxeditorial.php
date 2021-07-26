<?php
session_start();
if($_SESSION['auth'] == true){
$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=web123") or die(pg_last_error());

if($con){
	//echo "se abre la conexióna la BD";
	$query= "select * from libroeditorial";	
	$query = pg_query($con,$query) or die(pg_last_error());
	$arreglo =pg_fetch_all($query);
	if($query){

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Catálogo libro x editorial </title>
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
<h2> Catálogo libro por editorial </h2>
<table>
	<thead>
		<tr>
			<th>Nombre del libro</th>
			<th>Nombre del editorial</th>
			<th>País de la editorial</th>
		</tr>
	</thead>
	<tbody>
<?php
	while($row =pg_fetch_array($query)){
		echo "<tr>";
		
		echo "<td>".$row['nombre_libro']."</td>";
		echo "<td>".$row['nombre_editorial']."</td>";
		echo "<td>".$row['pais_editorial']."</td>";
		echo "</tr>";
	}
?>	
	</tbody>
</table>
</div>
</body>
</html>
<?php
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

