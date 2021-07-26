<?php
$id_autor = $_POST['id_autor'];
$nombre_autor = $_POST['nombre_autor'];
$apaterno_autor = $_POST['apaterno_autor'];
$amaterno_autor = $_POST['amaterno_autor'];
$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password= web123") or die(pg_last_error());

if($con){
	$query="update autor set nombre_autor='".$nombre_autor."',apaterno_autor='".$apaterno_autor."',amaterno_autor='".$amaterno_autor."'where id_autor ='".$id_autor."'";
	$query= pg_query($con,$query)or die(pg_last_error());
	if($query){
		echo '<script type="text/javascript">
		     alert("Se actualizó correctamente el autor");
		     window.location.href="indexautor.php"
		     </script>';
	}else{
		echo "<p>No se ejecuto la sentencia SQL </p>";
	}

}else{
	echo "Ocurrio un error";
}
?>
