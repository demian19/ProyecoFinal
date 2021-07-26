<?php
$id_editorial = $_POST['id_editorial'];

$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=web123") or die(pg_last_error());

if($con){
	$query ="delete from editorial where id_editorial ='".$id_editorial."'";
	$query =pg_query($con,$query) or die(pg_last_error());
	if($query){
		echo '<script type="text/javascript">
		     alert("Se eliminó la editorial correctamente");
		     window.location.href="indexeditorial.php";
		     </script>';
	}else{
		echo "<p>No se ejecutó la sentencia SQL</p>";
	}
}else{
	echo "Ocurrio un error";
}
?>
