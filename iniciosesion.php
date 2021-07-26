<!DOCTYPE html>
<html>
	<head>
		<meta charset= "UTF-8">
		<title> Iniciar sesion </title>
		<link rel="stylesheet" type="text/css" href="css/estilo_login.css"/>
	</head>
	<body>
		<h1> Inicar sesion </h1>
		<form name="login" action="login.php" method="post">
			<label for ="nombre">Nombre de usuario:</label>
			<input type ="text" name="nombre"></br>
			<label for= "pass">Contraseña:</label>
			<input type ="password" name= "pass"></br>
			<input type= "submit" value="Iniciar sesion">
		</form>
	</body>
</html>
