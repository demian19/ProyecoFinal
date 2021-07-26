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
$id_autor = $_POST['id_autor'];
$id_editorial = $_POST['id_editorial'];
$nombre_libro = $_POST['nombre_libro'];
$edicion_libro = $_POST['edicion_libro'];
$anio_publicacion = $_POST['anio_publicacion'];
	
$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=web123") or die(pg_last_error());

if($con){
	//echo "se abre la conexióna la BD";
	$query_libro= "insert into libro(id_autor,id_editorial,nombre_libro,anio_publicacion,edicion_libro) values('".$id_autor."','".$id_editorial."','".$nombre_libro."','".$anio_publicacion."','".$edicion_libro."')";
	$query_libro =pg_query($con,$query_libro) or die(pg_last_error());
	
	
	if($query_libro){
			echo '<script type ="text/javascript">
			alert("Se registró el libro correctamente");
			window.location.href="index.php";
			</script>';
	
		

	}else{
		echo "No se pudo ejecutar la sentencia SQL";
	}
}else{
	echo "hubo un error";
}
//realizamos la insercion




?>
