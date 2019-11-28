<?php

session_start();

include("conexion.php");
$nombre=$_POST["nombre"];
$password=hash("whirlpool", $_POST["password"]);


$statement ="SELECT nombre,password,id FROM usuario WHERE nombre = '$nombre' AND password = '$password'";

$resultado = $conexionBD->query($statement);
if($resultado->num_rows > 0){
	echo "bienvenid@" .$nombre;
	session_start();
	$_SESSION["datosUsuario"]=mysqli_fetch_assoc($resultado);
	$_SESSION["nombre"]=$nombre;
}
else{
	echo "Usuario o contraseña incorrectos";
}

//var_dump($resultado);
?>