<?php
$id_libro = $_POST['id_libro'];

$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=web123") or die(pg_last_error());

if($con){
	$query ="delete from libro where id_libro ='".$id_libro."'";
	$query =pg_query($con,$query) or die(pg_last_error());
	if($query){
		echo '<script type="text/javascript">
		     alert("Se eliminó el libro correctamente");
		     window.location.href="index.php";
		     </script>';
	}else{
		echo "<p>No se ejecutó la sentencia SQL</p>";
	}
}else{
	echo "Ocurrio un error";
}
?>
