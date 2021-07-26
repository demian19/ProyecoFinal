<?php
$id_autor = $_POST['id_autor'];

$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=web123") or die(pg_last_error());

if($con){
	$query ="delete from autor where id_autor ='".$id_autor."'";
	$query =pg_query($con,$query) or die(pg_last_error());
	if($query){
		echo '<script type="text/javascript">
		     alert("Se eliminó el autor correctamente");
		     window.location.href="indexautor.php";
		     </script>';
	}else{
		echo "<p>No se ejecutó la sentencia SQL</p>";
	}
}else{
	echo "Ocurrio un error";
}
?>
