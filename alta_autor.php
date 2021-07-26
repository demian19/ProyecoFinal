
<?php
/*
 *alta_alumno.php
 *Recibe los datos de alumno dorm_alumno.php los procesa e inserta
 *author=ltorres
 *date: 18 03 2021
 *s
 *
 *
 *
 *
 */
//print_r($_POST);
//
$nombre_autor = $_POST['nombre_autor'];
$apaterno_autor = $_POST['apaterno_autor'];
$amaterno_autor = $_POST['amaterno_autor'];
	

$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=web123") or die(pg_last_error());

if($con){
	//echo "se abre la conexióna la BD";
	$query_autor= "insert into autor(nombre_autor,apaterno_autor,amaterno_autor) values('".$nombre_autor."','".$apaterno_autor."','".$amaterno_autor."')";
	$query_autor =pg_query($con,$query_autor) or die(pg_last_error());
	
	
	if($query_autor){
		
		echo '<script type ="text/javascript">
		     alert("Se registró correctamente el autor");
		     window.location.href="form_libros.php";
		     </script>';	
	}else{
		echo "No se pudo ejecutar la sentencia SQL";
		echo "<a href='form_libros.php'> Volver al registro del libro</a><br/>";	
	}
}else{
	echo "hubo un error";
}
//realizamos la insercion




?>
