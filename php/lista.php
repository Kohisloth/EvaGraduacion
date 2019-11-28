<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>lista de usuarios</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
	<?php

	include ("conexion.php");
	$consulta="SELECT nombre, password, email  FROM usuarios;";
	$resultado=$conexionBD->query($consulta);
	//var_dump(resultado);
	$usuario=array();

	echo"<table class=\"table table-striped\">
	<tr>
	<th>Nombre</th>
	<th>Cotraseña</th>
	<th>Email</th>
	</tr>
	";


	while($fila=mysqli_fetch_assoc($resultado)){
		$usuario[]=fila;

		$nombre=$fila["nombre"];
		$password=$fila["password"];
		$email=$fila["email"];



		echo"<tr>

		<td>$nombre</td>
		<td>$password</td>
		<td>$email</td>





		</tr>";
	}

	//var_dump($usuario);


	?>

</body>
</html>