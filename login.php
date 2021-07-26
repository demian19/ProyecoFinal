<?php
$con = pg_connect("port=5432 dbname= biblioteca user=bibliotecario password=web123")or die(pg_last_error());

$usuario = $_POST['nombre'];
$pass = $_POST['pass'];
$pass_cifrado = md5($pass);
$query = "select username_usuario,pass_usuario from usuario where username_usuario ='".$usuario."'";
$query = pg_query($con,$query);
$resultado = pg_fetch_assoc($query);
if($pass_cifrado == $resultado['pass_usuario']){
	echo "Si coinciden";
	session_start();
	$_SESSION['auth'] = true;
	header("Location: index.php");
} else{
	header('Location: iniciosesion.php?login=false');
	//echo "Hubo un error en la contaseña o usuario, intentelo de nuevo";
}
?>

//Comparar con los valores existentes
//tener en la BD una tabla de usuarios validos para la aplicación
