<?php

$id_editorial = $_POST['id_editorial'];
$nombre_editorial = $_POST['nombre_editorial'];
$pais_editorial = $_POST['pais_editorial'];
$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password= web123") or die(pg_last_error());

if($con){
	$query="update editorial set nombre_editorial='".$nombre_editorial."', pais_editorial ='".$pais_editorial."'where id_editorial ='".$id_editorial."'";
	$query= pg_query($con,$query)or die(pg_last_error());
	if($query){
		echo '<script type="text/javascript">
		     alert("Se actualizó correctamente la editorial")
		     window.location.href="indexeditorial.php"
		     </script>';
	}else{
		echo "<p>No se ejecuto la sentencia SQL </p>";
	}

}else{
	echo "Ocurrio un error";
}
?>
