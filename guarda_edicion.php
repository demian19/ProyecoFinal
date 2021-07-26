<?php

$id_libro= $_POST['id_libro'];
$nombre_libro = $_POST['nombre_libro'];
$edicion_libro =$_POST['edicion_libro'];
$anio_publicacion=$_POST['anio_publicacion'];
$id_autor = $_POST['id_autor'];
$id_editorial = $_POST['id_editorial'];
$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password= web123") or die(pg_last_error());

if($con){
	$query="update libro set nombre_libro='".$nombre_libro."',edicion_libro ='".$edicion_libro."',anio_publicacion='".$anio_publicacion."',id_autor='".$id_autor."',id_editorial='".$id_editorial."'where id_libro ='".$id_libro."'";
	$query= pg_query($con,$query)or die(pg_last_error());
	if($query){
		echo '<script type="text/javascript">
		     alert("Se actualizó correctamente el libro")
		     window.location.href="index.php"
		     </script>';
	}else{
		echo "<p>No se ejecuto la sentencia SQL </p>";
	}

}else{
	echo "Ocurrio un error";
}
?>
